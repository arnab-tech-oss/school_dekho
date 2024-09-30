<?php

namespace App\Console\Commands;

use App\Core\BaseCommand;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class UpdateIpAllowList extends Command
{
    protected $signature = 'allowlist:update';
    protected $description = 'Update the IP allow list from multiple remote sources';
    protected $tempDir;

    public function handle()
    {
        $this->tempDir = storage_path('app/ip_allowlist_temp');

        if (!is_dir($this->tempDir)) {
            mkdir($this->tempDir, 0755, true);
        }

        Log::channel('filter')->info('Starting IP allowlist update.');
        $this->createTables();

        $urls = [
            'googlebot' => 'https://developers.google.com/search/apis/ipranges/googlebot.json',
            'applebot' => 'https://search.developer.apple.com/applebot.json',
            'bingbot' => 'https://www.bing.com/toolbox/bingbot.json',
            'duckduckgobot' => 'https://raw.githubusercontent.com/myschooldekho/allowlist/main/duckduckgo_ipv4.json',
            'facebook' => 'https://www.facebook.com/peering/geofeed',
        ];

        // not impleemanted yet
        // facebook : https://www.facebook.com/peering/geofeed

        foreach ($urls as $bot => $url) {
            if ($bot === 'facebook') {
                $this->downloadAndProcessFacebookGeofeed($url);
            } else {
                $this->downloadAndProcessIpRanges($bot, $url);
            }
        }

        Log::channel('filter')->info('IP allowlist updated successfully.');
        $this->info('IP allowlist updated successfully.');
    }

    protected function createTables()
    {
        $connection = DB::connection('sqlite_ips');

        // Drop the existing tables if they exist
        Schema::connection('sqlite_ips')->dropIfExists('allowlist_ipv4');
        Schema::connection('sqlite_ips')->dropIfExists('allowlist_ipv6');

        // Create the allowlist_ipv4 table
        Schema::connection('sqlite_ips')->create('allowlist_ipv4', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('start_ip')->nullable();
            $table->unsignedInteger('end_ip')->nullable();
            $table->timestamps();
            $table->index('start_ip');
            $table->index('end_ip');
        });

        Log::channel('filter')->info('IPv4 allowlist table created.');

        // Create the allowlist_ipv6 table
        Schema::connection('sqlite_ips')->create('allowlist_ipv6', function (Blueprint $table) {
            $table->increments('id');
            $table->binary('start_ip')->nullable();
            $table->binary('end_ip')->nullable();
            $table->timestamps();
            $table->index('start_ip');
            $table->index('end_ip');
        });

        Log::channel('filter')->info('IPv6 allowlist table created.');
    }

    protected function downloadAndProcessIpRanges($bot, $url)
    {
        try {
            $response = Http::get($url);

            if ($response->successful()) {
                $filePath = $this->tempDir . "/{$bot}.json";
                file_put_contents($filePath, $response->body());

                $this->processIpRanges($bot, $filePath);

                unlink($filePath);
                Log::channel('filter')->info("Temporary file deleted: $filePath.");
            } else {
                Log::channel('filter')->error("Failed to download IP ranges from $bot at $url.");
            }
        } catch (\Exception $e) {
            Log::channel('filter')->error("Error occurred while downloading IP ranges from $bot: " . $e->getMessage());
        }
    }

    protected function processIpRanges($bot, $filePath)
    {
        try {
            $data = json_decode(file_get_contents($filePath), true);

            if (isset($data['prefixes'])) {
                foreach ($data['prefixes'] as $prefix) {
                    if (isset($prefix['ipv4Prefix'])) {
                        $this->storeIpv4Range($prefix['ipv4Prefix']);
                    } elseif (isset($prefix['ipv6Prefix'])) {
                        $this->storeIpv6Range($prefix['ipv6Prefix']);
                    }
                }
                Log::channel('filter')->info("Processed IP ranges for $bot.");
            } elseif (isset($data['ipv4'])) {
                foreach ($data['ipv4'] as $ipAddress) {
                    $this->storeIpv4($ipAddress);
                }
            } else {
                Log::channel('filter')->warning("No prefixes found in the file from $bot.");
            }
        } catch (\Exception $e) {
            Log::channel('filter')->error("Error occurred while processing IP ranges from $bot: " . $e->getMessage());
        } finally {
            gc_collect_cycles();
            Log::channel('filter')->info("Garbage collection performed after processing $bot.");
        }
    }

    protected function storeIpv4($ipv4Ipaddress)
    {
        $longIpv4Address = ip2long($ipv4Ipaddress);

        DB::connection('sqlite_ips')->table('allowlist_ipv4')->insert([
            'start_ip' => $longIpv4Address,
            'end_ip' => $longIpv4Address,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    protected function storeIpv4Range($ipv4Prefix)
    {
        try {
            [$startIp, $cidr] = explode('/', $ipv4Prefix);
            $startIpLong = ip2long($startIp);
            $mask = (1 << (32 - $cidr)) - 1;
            $endIpLong = $startIpLong + $mask;

            DB::connection('sqlite_ips')->table('allowlist_ipv4')->insert([
                'start_ip' => $startIpLong,
                'end_ip' => $endIpLong,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Log::channel('filter')->info("Inserted IPv4 range: $startIp/$cidr.");
        } catch (\Exception $e) {
            Log::channel('filter')->error("Failed to insert IPv4 range $ipv4Prefix: " . $e->getMessage());
        }
    }

    protected function storeIpv6Range($ipv6Prefix)
    {
        try {
            [$startIp, $prefixLength] = explode('/', $ipv6Prefix);

            // Log::channel('filter')->info('starting ip' . $startIp . ' prefix ' . $prefixLength);

            $startIpBinary = bin2hex(inet_pton($startIp));

            $endIpBinary = bin2hex(BaseCommand::calculateIpv6End($startIp, (int) $prefixLength));

            DB::connection('sqlite_ips')->table('allowlist_ipv6')->insert([
                'start_ip' => $startIpBinary,
                'end_ip' => $endIpBinary,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Log::channel('filter')->info("Inserted IPv6 range: $ipv6Prefix.");
        } catch (\Exception $e) {
            Log::channel('filter')->error("Failed to insert IPv6 range $ipv6Prefix: " . $e->getMessage());
        }
    }

    protected function downloadAndProcessFacebookGeofeed($url)
    {
        try {
            $response = Http::get($url);

            if ($response->successful()) {
                $filePath = $this->tempDir . '/facebook_geofeed.csv';
                file_put_contents($filePath, $response->body());

                $this->processFacebookGeofeed($filePath);

                unlink($filePath);
                Log::channel('filter')->info("Temporary file deleted: $filePath.");
            } else {
                Log::channel('filter')->error("Failed to download Facebook geofeed at $url.");
            }
        } catch (\Exception $e) {
            Log::channel('filter')->error('Error occurred while downloading Facebook geofeed: ' . $e->getMessage());
        }
    }

    protected function processFacebookGeofeed($filePath)
    {
        try {
            $data = array_map('str_getcsv', file($filePath));

            foreach ($data as $row) {
                if (empty($row) || strpos($row[0], '#') === 0) {
                    continue;
                }

                [$ipPrefix, $country, $subdivision, $city] = $row;

                if (strpos($ipPrefix, ':') !== false) {
                    // Process IPv6
                    $this->storeIpv6Range($ipPrefix);
                } else {
                    // Process IPv4
                    $this->storeIpv4Range($ipPrefix);
                }
            }

            Log::channel('filter')->info('Processed Facebook geofeed.');
        } catch (\Exception $e) {
            Log::channel('filter')->error('Error occurred while processing Facebook geofeed: ' . $e->getMessage());
        }
    }
}

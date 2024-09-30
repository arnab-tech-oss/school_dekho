<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use SplFileObject;

class UpdateIpBlacklist extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blacklist:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the IP blacklist from remote sources';

    /**
     * The number of rows to insert per batch.
     *
     * @var int
     */
    protected $batchSize = 2000;

    /**
     * Paths to the temporary files.
     *
     * @var array
     */
    protected $filePaths = [
        'ipsum' => 'storage/app/temp_ipsum.txt',
        'redlist' => 'storage/app/temp_redlist.txt'
    ];

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        ini_set('memory_limit', '1G');
        set_time_limit(0);

        $urls = [
            'ipsum' => 'https://raw.githubusercontent.com/stamparm/ipsum/master/ipsum.txt',
            'redlist' => 'https://redlist.redstout.com/redlist.txt'
        ];

        Log::channel('filter')->info('Starting IP blacklist update.');

        $connection = DB::connection('sqlite_ips');

        // Drop and recreate the table before processing any files
        $this->dropAndRecreateTable();

        foreach ($urls as $key => $url) {
            $this->filePaths[$key] = storage_path('app/temp_' . $key . '.txt');

            try {
                $response = Http::get($url);

                if ($response->successful()) {
                    file_put_contents($this->filePaths[$key], $response->body());
                    Log::channel('filter')->info(ucfirst($key) . ' blacklist data saved to file.');

                    $this->processFileInChunks($key);

                    unlink($this->filePaths[$key]);
                    Log::channel('filter')->info('Temporary file deleted for ' . ucfirst($key) . '.');

                    gc_collect_cycles();
                    Log::channel('filter')->info('Garbage collection performed.');
                } else {
                    Log::channel('filter')->error('Failed to fetch ' . ucfirst($key) . ' blacklist from ' . $url);
                    $this->error('Failed to fetch ' . ucfirst($key) . ' blacklist.');
                }
            } catch (\Exception $e) {
                Log::channel('filter')->error('Error occurred during ' . ucfirst($key) . ' blacklist update: ' . $e->getMessage());
                $this->error('An error occurred during the update.');
            }
        }

        $this->info('IP blacklist updated successfully.');
    }

    /**
     * Drop and recreate the blacklist_ipv4 table.
     *
     * @return void
     */
    protected function dropAndRecreateTable()
    {
        $connection = DB::connection('sqlite_ips');

        Schema::connection('sqlite_ips')->dropIfExists('blacklist_ipv4');
        Log::channel('filter')->info('Dropped existing blacklist_ipv4 table.');

        Schema::connection('sqlite_ips')->create('blacklist_ipv4', function ($table) {
            $table->id();
            $table->unsignedBigInteger('ip')->index();
            $table->integer('rating')->nullable();
            $table->timestamps();
        });
        Log::channel('filter')->info('Recreated blacklist_ipv4 table with indexing.');
    }

    /**
     * Process the file in chunks of the specified batch size.
     *
     * @param string $fileKey
     * @return void
     */
    protected function processFileInChunks($fileKey)
    {
        $connection = DB::connection('sqlite_ips');
        $connection->beginTransaction();

        try {
            $file = new SplFileObject($this->filePaths[$fileKey]);
            $insertData = [];
            $lineCount = 0;

            if ($fileKey === 'ipsum') {
                $file->setFlags(SplFileObject::READ_CSV);
                $file->setCsvControl("\t");

                foreach ($file as $line) {
                    if (empty($line[0]) || $line[0][0] == '#') {
                        continue;
                    }

                    [$ip, $rating] = $line;
                    $ipLong = ip2long($ip);

                    $insertData[] = [
                        'ip' => $ipLong,
                        'rating' => (int) $rating,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $lineCount++;

                    if (count($insertData) >= $this->batchSize) {
                        // Use insertOrIgnore to avoid duplicates
                        $connection->table('blacklist_ipv4')->insertOrIgnore($insertData);
                        $insertData = [];

                        gc_collect_cycles();
                    }
                }
            } elseif ($fileKey === 'redlist') {
                // Process Redlist file
                foreach ($file as $line) {
                    $line = trim($line);
                    if (empty($line) || $line[0] === '#' || filter_var($line, FILTER_VALIDATE_IP) === false) {
                        continue;
                    }

                    $ipLong = ip2long($line);

                    $insertData[] = [
                        'ip' => $ipLong,
                        'rating' => null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $lineCount++;

                    if (count($insertData) >= $this->batchSize) {
                        // Use insertOrIgnore to avoid duplicates
                        $connection->table('blacklist_ipv4')->insertOrIgnore($insertData);
                        $insertData = [];

                        gc_collect_cycles();
                    }
                }
            }

            if (!empty($insertData)) {
                // Insert remaining data
                $connection->table('blacklist_ipv4')->insertOrIgnore($insertData);
                Log::channel('filter')->info('Inserted remaining ' . count($insertData) . ' IPs into blacklist_ipv4 table.');
            }

            $connection->commit();
            $connection->statement('VACUUM');
            Log::channel('filter')->info('VACUUM performed on the SQLite database.');

            Log::channel('filter')->info('File processing completed for ' . ucfirst($fileKey) . '. Total lines processed: ' . $lineCount);
        } catch (\Exception $e) {
            $connection->rollBack();
            Log::channel('filter')->error('Failed to process ' . ucfirst($fileKey) . ' blacklist file: ' . $e->getMessage());
            $this->error('Failed to process ' . ucfirst($fileKey) . ' blacklist file.');
        }
    }
}

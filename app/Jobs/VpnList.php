<?php

namespace App\Jobs;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class VpnList
{
    protected $client;
    protected $ipv4Set = [];
    protected $ipv6Set = [];

    public function __construct()
    {
        $this->client = new Client();
    }

    public function handle()
    {
        $this->updateIpAddresses();
    }

    public function updateIpAddresses()
    {
        ini_set('memory_limit', '1G');  // Adjust as needed
        set_time_limit(0);  // Removes the time limit for the script

        Log::channel('filter')->info('Starting IP address update...');

        $downloadDir = storage_path('app/vpnOrProxy_temp');

        // Create directory if it doesn't exist
        if (!is_dir($downloadDir)) {
            mkdir($downloadDir, 0755, true);
        }

        // Define URLs and their corresponding file names
        $urls = [
            'https://raw.githubusercontent.com/X4BNet/lists_vpn/main/output/datacenter/ipv4.txt' => $downloadDir . '/datacenter.txt',
            'https://raw.githubusercontent.com/X4BNet/lists_vpn/main/output/vpn/ipv4.txt' => $downloadDir . '/vpn.txt',
            'https://raw.githubusercontent.com/MISP/misp-warninglists/main/lists/vpn-ipv4/list.json' => $downloadDir . '/ipv4.json',
            'https://raw.githubusercontent.com/MISP/misp-warninglists/main/lists/vpn-ipv6/list.json' => $downloadDir . '/ipv6.json',
        ];

        $this->downloadFiles($urls);
        $this->processFiles(array_values($urls));

        Log::channel('filter')->info('IP address update complete.');

        // Remove downloaded files
        foreach ($urls as $file) {
            if (file_exists($file)) {
                unlink($file);
                Log::channel('filter')->info("Removed file: $file");
            }
        }
    }

    protected function downloadFiles(array $urls)
    {
        foreach ($urls as $url => $file) {
            Log::channel('filter')->info("Downloading $url...");
            $response = $this->client->get($url);
            file_put_contents($file, $response->getBody()->getContents());
            Log::channel('filter')->info("Download complete: $file");
        }
    }

    protected function processFiles(array $files)
    {
        // Create and set up in-memory database
        $memoryDb = new \PDO('sqlite::memory:');
        $memoryDb->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        // Create tables in the memory database if they don't exist
        $memoryDb->exec('
        CREATE TABLE IF NOT EXISTS vpnlist_ipv4 (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            start_ip INTEGER,
            end_ip INTEGER
        )
    ');

        $memoryDb->exec('
        CREATE TABLE IF NOT EXISTS vpnlist_ipv6 (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            start_ip BLOB,
            end_ip BLOB
        )
    ');

        foreach ($files as $file) {
            Log::channel('filter')->info("Processing $file...");
            $this->processFile($file, $memoryDb);
            Log::channel('filter')->info("Processing complete: $file");
            gc_collect_cycles();
        }

        // Set up the disk database
        $diskDb = new \PDO('sqlite:' . database_path('ip_filter.sqlite'));
        $diskDb->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $diskDb->exec('PRAGMA journal_mode = WAL;');

        // Create tables in the disk database if they don't exist
        $diskDb->exec('
        CREATE TABLE IF NOT EXISTS vpnlist_ipv4 (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            start_ip INTEGER,
            end_ip INTEGER
        )
    ');

        $diskDb->exec('
        CREATE TABLE IF NOT EXISTS vpnlist_ipv6 (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            start_ip BLOB,
            end_ip BLOB
        )
    ');

        // Create indexes if they do not exist
        $diskDb->exec('CREATE INDEX IF NOT EXISTS idx_vpnlist_ipv4_start_ip ON vpnlist_ipv4 (start_ip)');
        $diskDb->exec('CREATE INDEX IF NOT EXISTS idx_vpnlist_ipv4_end_ip ON vpnlist_ipv4 (end_ip)');
        $diskDb->exec('CREATE INDEX IF NOT EXISTS idx_vpnlist_ipv6_start_ip ON vpnlist_ipv6 (start_ip)');
        $diskDb->exec('CREATE INDEX IF NOT EXISTS idx_vpnlist_ipv6_end_ip ON vpnlist_ipv6 (end_ip)');

        $this->bulkInsertFromMemoryDb($memoryDb, $diskDb);

        gc_collect_cycles();
    }

    protected function processFile($file, \PDO $memoryDb)
    {
        if (Str::endsWith($file, '.json')) {
            $json = json_decode(file_get_contents($file), true);
            $list = $json['list'] ?? [];
            $type = Str::contains($file, 'ipv4') ? 'ipv4' : 'ipv6';
            $this->processList($list, $type, $memoryDb);
        } else {
            $this->processTextFile($file, $memoryDb);
        }
    }

    protected function processList(array $list, $type, \PDO $memoryDb)
    {
        $batch = [];
        foreach ($list as $item) {
            $ipRange = explode('/', $item);
            if (count($ipRange) === 2) {
                $startIp = $type === 'ipv4' ? ip2long($ipRange[0]) : bin2hex(inet_pton($ipRange[0]));
                $endIp = $type === 'ipv4' ? $this->calculateIpv4End($startIp, $ipRange[1]) : bin2hex($this->calculateIpv6End(inet_pton($ipRange[0]), $ipRange[1]));

                $ipKey = "{$startIp}-{$endIp}";

                if ($type === 'ipv4') {
                    if (!in_array($ipKey, $this->ipv4Set)) {
                        $this->ipv4Set[] = $ipKey;
                        $batch[] = [
                            'start_ip' => $startIp,
                            'end_ip' => $endIp,
                        ];
                    }
                } elseif ($type === 'ipv6') {
                    if (!in_array($ipKey, $this->ipv6Set)) {
                        $this->ipv6Set[] = $ipKey;
                        $batch[] = [
                            'start_ip' => $startIp,
                            'end_ip' => $endIp,
                        ];
                    }
                }

                // Insert the batch into the database if it reaches the threshold
                if (count($batch) >= 5000) {
                    $this->insertBatch($batch, $memoryDb, $type);
                    $batch = [];
                    gc_collect_cycles();
                }
            }
        }

        // Insert any remaining items in the batch
        if (!empty($batch)) {
            $this->insertBatch($batch, $memoryDb, $type);
        }
    }

    protected function processTextFile($file, \PDO $memoryDb)
    {
        $handle = fopen($file, 'r');
        if (!$handle) {
            throw new \Exception("Cannot open file: $file");
        }

        $batch = [];
        while (($line = fgets($handle)) !== false) {
            $line = trim($line);
            if (!empty($line)) {
                $ipRange = explode('/', $line);
                $startIp = ip2long($ipRange[0]) & ((-1 << (32 - $ipRange[1])));
                $endIp = $startIp + pow(2, (32 - $ipRange[1])) - 1;

                // Check for duplicates
                $ipKey = "{$startIp}-{$endIp}";
                if (!in_array($ipKey, $this->ipv4Set)) {
                    $this->ipv4Set[] = $ipKey;
                    $batch[] = [
                        'start_ip' => $startIp,
                        'end_ip' => $endIp,
                    ];

                    if (count($batch) >= 5000) {
                        $this->insertBatch($batch, $memoryDb, 'ipv4');
                        $batch = [];
                        gc_collect_cycles();
                    }
                }
            }
        }

        if (!empty($batch)) {
            $this->insertBatch($batch, $memoryDb, 'ipv4');
        }

        fclose($handle);
        gc_collect_cycles();
    }

    protected function insertBatch(array $batch, \PDO $pdo, $type)
    {
        if (empty($batch)) {
            return;
        }

        $placeholders = [];
        $values = [];

        foreach ($batch as $row) {
            $placeholders[] = '(?, ?)';
            $values[] = $row['start_ip'];
            $values[] = $row['end_ip'];
        }

        $table = $type === 'ipv4' ? 'vpnlist_ipv4' : 'vpnlist_ipv6';
        $sql = 'INSERT INTO ' . $table . ' (start_ip, end_ip) VALUES ' . implode(', ', $placeholders);
        $stmt = $pdo->prepare($sql);
        $stmt->execute($values);
    }

    protected function bulkInsertFromMemoryDb(\PDO $memoryDb, \PDO $diskDb)
    {
        $diskDb->exec('PRAGMA foreign_keys = OFF;');
        $diskDb->exec('PRAGMA synchronous = OFF;');
        $diskDb->exec('PRAGMA count_changes = OFF;');
        $diskDb->exec('PRAGMA temp_store = MEMORY;');
        $diskDb->exec('PRAGMA journal_mode = MEMORY;');

        // Start a transaction
        $diskDb->beginTransaction();

        $tables = [
            'ipv4' => 'vpnlist_ipv4',
            'ipv6' => 'vpnlist_ipv6'
        ];

        foreach ($tables as $type => $tableName) {
            // Drop the table if it exists
            $diskDb->exec('DROP TABLE IF EXISTS ' . $tableName);

            // Recreate the table
            $createTableSql = $type === 'ipv4' ? '
            CREATE TABLE IF NOT EXISTS ' . $tableName . ' (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                start_ip INTEGER,
                end_ip INTEGER
            )' : '
            CREATE TABLE IF NOT EXISTS ' . $tableName . ' (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                start_ip BLOB,
                end_ip BLOB
            )';
            $diskDb->exec($createTableSql);

            // Create indexes if they do not exist
            $diskDb->exec('CREATE INDEX IF NOT EXISTS idx_' . $tableName . '_start_ip ON ' . $tableName . ' (start_ip)');
            $diskDb->exec('CREATE INDEX IF NOT EXISTS idx_' . $tableName . '_end_ip ON ' . $tableName . ' (end_ip)');

            // Query from the memory database and insert into the disk database
            $query = $memoryDb->query('SELECT * FROM ' . $tableName);
            $chunkSize = 10000;
            $data = [];

            while ($row = $query->fetch(\PDO::FETCH_ASSOC)) {
                $data[] = $row;

                if (count($data) >= $chunkSize) {
                    $this->insertBatch($data, $diskDb, $type);
                    $data = [];
                    gc_collect_cycles();
                }
            }

            if (!empty($data)) {
                $this->insertBatch($data, $diskDb, $type);
            }
        }

        // Commit the transaction
        $diskDb->commit();
        $diskDb->exec('PRAGMA foreign_keys = ON;');
    }

    protected function calculateIpv4End($startIp, $prefixLength)
    {
        $mask = ~((1 << (32 - $prefixLength)) - 1);
        return $startIp | ~$mask;
    }

    protected function calculateIpv6End($startIp, $prefixLength)
    {
        $startBinary = unpack('a16', $startIp)[1];
        if ($prefixLength < 0 || $prefixLength > 128) {
            throw new \InvalidArgumentException('Invalid IPv6 prefix length: ' . $prefixLength);
        }
        $startHex = bin2hex($startBinary);
        $bitsToSet = 128 - $prefixLength;
        $endHex = $startHex;

        for ($i = 0; $i < $bitsToSet; $i++) {
            $bitPosition = 127 - $i;
            $nibblePosition = (int) ($bitPosition / 4);
            $bitOffset = $bitPosition % 4;
            $currentNibble = hexdec($endHex[$nibblePosition]);
            $endNibble = $currentNibble | (1 << $bitOffset);
            $endHex[$nibblePosition] = dechex($endNibble);
        }

        return hex2bin($endHex);
    }
}

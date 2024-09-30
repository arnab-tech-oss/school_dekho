<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MoveAndRenameLog extends Command
{
    protected $signature = 'log:move-and-rename';
    protected $description = 'Move and rename all .log files to a -history folder with the current date';

    public function handle()
    {
        $logsPath = storage_path('logs');

        $logFiles = File::files($logsPath);

        foreach ($logFiles as $logFile) {
            if ($logFile->isFile() && $logFile->getExtension() === 'log') {
                $fileName = $logFile->getFilenameWithoutExtension();
                $historyDir = "{$logsPath}/{$fileName}-history";
                $date = Carbon::now()->format('Y-m-d');
                $newFileName = "{$fileName}-history-{$date}.log";
                $newFilePath = "{$historyDir}/{$newFileName}";

                if (!File::exists($historyDir)) {
                    File::makeDirectory($historyDir, 0755, true);
                }

                File::move($logFile->getRealPath(), $newFilePath);
                $this->info("Moved and renamed {$logFile->getFilename()} to {$newFilePath}");
            }
        }
    }
}

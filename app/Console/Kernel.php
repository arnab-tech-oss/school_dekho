<?php

namespace App\Console;

use App\Jobs\UpdateIpAddresses;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Schedule the job to run daily at 2:00 AM IST
        $schedule->job(new UpdateIpAddresses)->dailyAt('02:00')->timezone('Asia/Kolkata');
        $schedule->command('blacklist:update')->dailyAt('03:00')->timezone('Asia/Kolkata');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        // Load commands from the Commands directory
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}

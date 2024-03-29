<?php

namespace App\Console;
use App\Console\commands\Expiration;
use App\Console\commands\DatabsaeBackup;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    //protected $commands=['App\Console\commands\Expiration','App\Console\commands\DatabsaeBackup'];
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
       // $schedule->command('user:expiration')->everyMinute();
       $schedule->command('db:backup')->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

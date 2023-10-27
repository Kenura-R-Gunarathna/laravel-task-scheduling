<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('app:check:ad-promotions')
                ->everyMinute()
                ->runInBackground()
                ->withoutOverlapping()
                ->appendOutputTo("./storage/logs/check-ad-promotions.log");

        $schedule->command('app:check:memberships')
                ->everyMinute()
                ->runInBackground()
                ->withoutOverlapping()
                ->appendOutputTo("./storage/logs/check-ad-promotions.log");

        $schedule->command('app:run:bump-ad')
                ->everyTwoMinutes()
                ->runInBackground()
                ->withoutOverlapping()
                ->appendOutputTo("./storage/logs/check-ad-promotions.log");
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

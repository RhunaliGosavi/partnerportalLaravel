<?php

namespace App\Console;

use App\Console\Commands\dailyMail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        dailyMail::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('daily:mail')
            ->dailyAt('18:00');
        $schedule->command('queue:restart')
            ->everyFiveMinutes();
            $search=storage_path() . '/queue.log';
        if (stripos((string) shell_exec('ps xf | grep \'[q]ueue:work\' | grep \''.$search.'\''), $search) === false) {
                $schedule->command('queue:work --queue=default --sleep=2 --tries=3 --timeout=5')
                ->everyMinute()->appendOutputTo(storage_path() . '/queue.log')->withoutOverlapping();

                // echo 'starting!'."\n";
        }

        $schedule->command('queue:work --daemon')
            ->appendOutputTo(storage_path() . '/queue.log')
            ->everyMinute()
            ->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

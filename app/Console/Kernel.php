<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected function schedule(Schedule $schedule): void
    {
/*        $schedule->command('queue:work')->everyFourHours();
        $schedule->command('queue:restart')->everySixHours();*/
        $schedule->command('delete:inactive-users')->monthly();

    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

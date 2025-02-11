<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Kernel extends Command
{
    protected function schedule(\Illuminate\Console\Scheduling\Schedule $schedule)
    {
        $schedule->command('evidencia:delete')->daily();
        $schedule->command('promocion:dimensiones')
             ->yearlyOn(12, 31, '23:59');
        $schedule->command('promocion:notas')  ->dailyAt('23:59')
        ->when(function () {
            return now()->month == 12 && now()->day == 31;
        });
    }

}

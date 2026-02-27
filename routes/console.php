<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// Define your console commands here
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Define your scheduled tasks here
Schedule::command('app:move-file')->daily();
Schedule::command('app:create-user-log')->daily();
Schedule::command('app:new-inventory-items')->daily();

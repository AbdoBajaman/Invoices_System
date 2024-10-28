<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// In app/Console/Kernel.php


    Schedule::call(function () {

        // // Find users where the subscription has expired
        User::where('end_date', '<', now())
            ->where('is_active', 1)
            ->update(['is_active' => 2]); // Disable account
    })->daily(); // Run the task daily


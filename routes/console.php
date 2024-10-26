<?php

<<<<<<< HEAD
use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
=======
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
>>>>>>> 13c1e0c3d1f12f1ecc8641211bcad67a6fabfa5a

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();
<<<<<<< HEAD

// In app/Console/Kernel.php


    Schedule::call(function () {

        // // Find users where the subscription has expired
        User::where('end_date', '<', now())
            ->where('is_active', 1)
            ->update(['is_active' => 2]); // Disable account
    })->daily(); // Run the task daily

=======
>>>>>>> 13c1e0c3d1f12f1ecc8641211bcad67a6fabfa5a

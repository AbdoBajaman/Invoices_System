<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            //             countryseeder::class,
            sectionSeeder::class,
            productSeeder::class,
            // invoicesSeeder::class,
            PermissionSeeder::class,
            Create_Admin_User_Seeder::class,

            // RoleSeeder::class,

            // citySeeder::class,
        ]);
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

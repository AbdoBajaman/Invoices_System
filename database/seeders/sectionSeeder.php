<?php

namespace Database\Seeders;

use App\Models\sections;
use Database\Factories\sectionFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class sectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        sections::factory(1)->create();
    }
}

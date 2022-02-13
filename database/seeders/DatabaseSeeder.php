<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            genderSeeder::class,
            roleSeeder::class,
            ebookSeeder::class
        ]);
    }
}

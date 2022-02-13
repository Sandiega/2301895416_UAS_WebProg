<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class genderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gender')->insert([

            'id' => 1,
            'gender_desc' => 'Male',

        ]);

        DB::table('gender')->insert([

            'id' => 2,
            'gender_desc' => 'Female',

        ]);
    }
}

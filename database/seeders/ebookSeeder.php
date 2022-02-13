<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ebookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create('id_ID');
        for($i=1;$i<=10;$i++){
            DB::table('ebook')->insert([
                'id' => $i,
                'title' => $faker->name,
                'author' => $faker->name,
                'description' => $faker->Text(501)

            ]);
        }
    }
}

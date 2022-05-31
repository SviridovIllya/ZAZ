<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ManagerSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,15) as $index) {
            DB::table('managers')->insert([
                'name' => $faker->name(),
                'surname' => $faker->lastName(),
                'showroom_id' => $index,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}

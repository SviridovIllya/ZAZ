<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Showroom;
use Database\Factories\ShowroomFactory;
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
        Showroom::factory()->count(15)->create();
        Car::factory()->count(100)->create();
        $this->call([
            ManagerSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();
    }
}

<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition(): array
    {
        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));
        $v = $faker->vehicleArray();
        return [
            'brand' => $v['brand'],
            'model' => $v['model'],
            'type' => $faker->vehicleType,
            'door_count' => $faker->vehicleDoorCount,
            'seat_count' => $faker->vehicleSeatCount,
            'fuel_type' => $faker->vehicleFuelType,
            'gear_box_type' => $faker->vehicleGearBoxType,
            'showroom_id' => $this->faker->numberBetween($min = 1, $max = 15),
            'price' => $this->faker->numberBetween($min = 4999, $max = 150000),
            'year' => $this->faker->year($max = 'now'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

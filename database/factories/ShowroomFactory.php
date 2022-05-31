<?php

namespace Database\Factories;

use App\Models\Showroom;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ShowroomFactory extends Factory
{
    protected $model = Showroom::class;


    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'space' => $this->faker->numberBetween($min = 3, $max = 15),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'name' => $this->faker->unique->words(rand(1, 4), true),
            'description' => $this->faker->realText,
            'long' => $this->faker->longitude,
            'lat' => $this->faker->latitude,
        ];
    }
}

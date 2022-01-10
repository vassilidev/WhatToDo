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
        $validated = $this->faker->boolean(30);

        return [
            'user_id' => User::all()->random()->id,
            'visibility' => $this->faker->randomElement(['public', 'members', 'followers']),
            'name' => $this->faker->unique->words(rand(1, 4), true),
            'description' => $this->faker->realText,
            'long' => $this->faker->longitude(),
            'lat' => $this->faker->latitude(),
            'validated_at' => $validated ? now() : null,
        ];
    }
}

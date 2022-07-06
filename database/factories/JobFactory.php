<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'subtitle' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'length' => $this->faker->sentence(), // password
            'requirments' => $this->faker->sentence(),
            'tags' => $this->faker->sentence(),
            'requester_id' => $this->faker->numberBetween(1, 199),
            'taker_id' => $this->faker->unique()->numberBetween(1, 199)
        ];
    }
}

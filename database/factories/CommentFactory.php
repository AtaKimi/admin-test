<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'body' => $this->faker->paragraph(),
            'user_id' => $this->faker->numberBetween(1, 9),
            'job_id'=> $this->faker->numberBetween(1, 5),
        ];
    }
}

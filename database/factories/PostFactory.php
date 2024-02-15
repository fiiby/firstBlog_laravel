<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // should return an array not a string
            'user_id' => \App\Models\User::factory(),
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph(5),

        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
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
            'user_id' => rand(1,2),
            'folder_id' => rand(1, 20),
            'comment' => $this->faker->text(100),
            'status' => $this->faker->randomElement(['DONE', 'IMPORTANT', 'PENDING']),
        ];
    }
}

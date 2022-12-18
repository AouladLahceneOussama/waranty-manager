<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointement>
 */
class AppointementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "folder_id" => rand(1,20),
            "name" => $this->faker->name(),
            "date" => $this->faker->dateTimeBetween('now', '+10 days')
        ];
    }
}

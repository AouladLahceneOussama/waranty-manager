<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Folder>
 */
class FolderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "user_id" => rand(1,2),
            "numero_adheration" => $this->faker->numberBetween(0, 29873),
            "compagnie" => $this->faker->company(),
            "souscripteur" => $this->faker->text(10),
            "date_effet" => $this->faker->date(),
            "cotisation_ht" => $this->faker->numberBetween(100, 1000),
            "cotisation_ttc" => $this->faker->numberBetween(1000, 5000),
            "status" => "INCOMPLET",
        ];
    }
}

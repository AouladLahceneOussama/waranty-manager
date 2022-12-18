<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Insured>
 */
class InsuredFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['primary', 'secondary']);
        if ($type == 'primary') {
            return [
                "folder_id" => rand(1, 20),
                "nom" => $this->faker->name(),
                "prenom" => $this->faker->lastName(),
                "nom_jeune_fille" => $this->faker->lastName(),
                "primary_phone" => $this->faker->phoneNumber(),
                "secondary_phone" => $this->faker->phoneNumber(),
                "email" => $this->faker->safeEmail(),
                "pays_naissance" => $this->faker->country(),
                "departement_naissance" => $this->faker->countryCode(),
                "date_naissance" => $this->faker->date(),
                "civilite" => $this->faker->text(20),
                "etat_civil" => $this->faker->text(10),
                "code_organisme" => $this->faker->text(30),
                "code_securite_social" => $this->faker->numberBetween(1000, 6000),
                "iban" => $this->faker->iban(),
                "jour_prelevement" => $this->faker->randomElement([5, 10, 15]),
                "type" => "primary"
            ];
        } else {
            return [
                "folder_id" => rand(1, 20),
                "nom" => $this->faker->name(),
                "prenom" => $this->faker->lastName(),
                "date_naissance" => $this->faker->date(),
                "civilite" => $this->faker->text(20),
                "etat_civil" => $this->faker->text(10),
                "code_securite_social" => $this->faker->numberBetween(1000, 6000),
                "type" => "secondary"
            ];
        }
    }
}

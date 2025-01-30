<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RelationshipManagerModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rm_name' => $this->faker->name(),
            'phone_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'branch_id' => $this->faker->numberBetween(1, 10),
            'location' => $this->faker->city(),
            'language' => $this->faker->randomElement(['english','hindi','marathi','kannad','tamil','telgu']),
        ];
    }
}

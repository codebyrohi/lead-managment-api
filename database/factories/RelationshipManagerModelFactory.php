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
            'rm_id' => $this->faker->unique()->randomNumber(10),
            'name' => $this->faker->name,
            'years_of_experience' => $this->faker->numberBetween(0, 30),
            'client_feedback_score' => $this->faker->randomFloat(2, 0, 5),
            'top_3_feedback_keywords' => $this->faker->randomElement([
                'interested',$this->faker->word
            ]),
            'client_requests_for_same_rm' => $this->faker->numberBetween(0, 100),
            'response_time' => $this->faker->randomFloat(2, 0, 24),
            'skills' => json_encode($this->faker->randomElements([
                'Negotiation', 
                'Client Relations',
                'Market Analysis',
                'CRM Software',
                'Contract Management'
            ], 3)),
            'avg_sale_ticket_size' => $this->faker->randomFloat(2, 50000, 5000000),
            'language' => $this->faker->randomElement([
                'English, Hindi',
                'English, Tamil',
                'Hindi, Marathi',
                'English, Telugu'
            ]),
            'locality' => $this->faker->city,
            'properties_managed' => $this->faker->numberBetween(0, 1000),
            'availability' => $this->faker->randomElement([
                'Available',
                'Busy',
                'On Leave',
                'Offline'
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\LeadsModel;
use Faker\Generator as Faker;
class LeadsModelFactory extends Factory
{
    protected $model = LeadsModel::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
         return [
            'id' => $this->faker->uuid,
            'assigned_rm_id' => $this->faker->uuid,
            'min_budget' => $this->faker->numberBetween(10000, 50000),
            'max_budget' => $this->faker->numberBetween(50000, 140000),
            'conversion_probability' => $this->faker->randomFloat(2, 0, 1),
            'email' => $this->faker->safeEmail,
            'interaction_history' => json_encode([
                [
                    'feedback' => [
                        'rating' => $this->faker->numberBetween(1, 5),
                        'comment' => $this->faker->text(500),
                        'resolved' => $this->faker->boolean(), 
                        'date'=> $this->faker->date(),
                        "action"=>$this->faker->word
                    ],
                ],
            ]),
            'last_contact_date' => now(),
            'name' => $this->faker->name,
            'phone' => '+91' .  $this->faker->numerify('9#########'),
            'preferences' => json_encode(["industry" =>"Retail", "location" => $this->faker->word]),
            'sentiment' => $this->faker->randomElement([$this->faker->word,'sentiment']),
            'source' => $this->faker->randomElement(['Online Listing', 'Referral', 'Advertisement', 'Other']),
            'status' => $this->faker->randomElement(['New','Contacted']),
            'created_at' => now(),
            'updated_at' => now(),
            'amenities' => json_encode(['Parking','Chargin Point','Garden','play area']),
            'industry'=> $this->faker->randomElement(['residential','commercial']),
            'location'=> $this->faker->randomElement(['Nashik','Pune','Benglore','Mumbai','Delhi']),
            'property_type'=> $this->faker->randomElement(['Apartment','House','Villa','Office','Retail']),
            'additional_preferences' => $this->faker->text(100),
            'visit_scheduled' => $this->faker->boolean(),
            'last_visit_date' => now(),
            'rm_assigned_at' => now(),



        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\LeadsModel;
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
            'lead_name' => $this->faker->name(),
            'phone_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'location' => $this->faker->city(),
            'property_type' => $this->faker->randomElement(['House', 'Apartment', 'Condo']),
            'budget_from' => $this->faker->randomElement(['40L','45L','50L','55L']),
            'budget_to' => $this->faker->randomElement(['60L','65L','70L','75L']),
            'bedrooms' => $this->faker->numberBetween(1, 5),
            'bathrooms' => $this->faker->numberBetween(1, 3),
            'move_in_date' => $this->faker->date(),
            'interest_level' => $this->faker->randomElement(['High', 'Medium', 'Low']),
            'heard_about' => $this->faker->randomElement(['Online Listing', 'Referral', 'Advertisement', 'Other']),
            'language' => $this->faker->randomElement(['english','hindi','marathi','kannad','tamil','telgu']),
        ];
    }
}

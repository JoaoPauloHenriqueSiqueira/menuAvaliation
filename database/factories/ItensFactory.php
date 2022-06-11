<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItensFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'company_id' => Company::factory(),
            'price' => $this->faker->randomFloat(0, 150),
            'stars' => $this->faker->randomNumber(),
            'clicks' => 0
        ];
    }
}

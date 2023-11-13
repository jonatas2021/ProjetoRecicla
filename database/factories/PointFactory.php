<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Point>
 */
class PointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->name(),
            'complement'=> fake()->text(20),
            'latitude'=> fake()->numberBetween(10000,200000),
            'longitude'=> fake()->numberBetween(10000,200000),
            'company_id'=> Company::all()->random()->id,
            'status'=> fake()->numberBetween(0,0),
        ];
    }
}

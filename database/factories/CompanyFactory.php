<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
Use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //

            'name' => fake()->name(),
            'cnpj' => "###############",
            'phone' => fake()->phoneNumber(), 
            'dataC' => fake()->date('d_m_y'),
            'user_id' => User::all()->random()->id,

        ];
    }
}

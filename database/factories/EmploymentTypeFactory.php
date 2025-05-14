<?php

namespace Database\Factories;

use App\Models\EmploymentType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<EmploymentType>
 */
class EmploymentTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Full Time',
                'Part Time',
                'Contract',
                'Internship',
                'Temporary',
                'Volunteer',
                'Freelance',
            ]),
        ];
    }
}

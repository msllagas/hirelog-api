<?php

namespace Database\Factories;

use App\Models\ApplicationStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ApplicationStatus>
 */
class ApplicationStatusFactory extends Factory
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
                'Pending',
                'Interview Scheduled',
                'Rejected',
                'Accepted',
                'Offer Received',
                'Withdrawn',
                'In Review',
            ]),
        ];
    }
}

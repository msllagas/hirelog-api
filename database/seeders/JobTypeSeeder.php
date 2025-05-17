<?php

namespace Database\Seeders;

use App\Models\JobType;
use Illuminate\Database\Seeder;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Full-Time',
            'Part-Time',
            'Contract',
            'Freelance',
            'Internship',
            'Temporary',
        ];

        foreach ($types as $type) {
            JobType::create(['name' => $type]);
        }
    }
}

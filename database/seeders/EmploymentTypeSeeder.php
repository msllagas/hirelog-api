<?php

namespace Database\Seeders;

use App\Models\EmploymentType;
use Illuminate\Database\Seeder;

class EmploymentTypeSeeder extends Seeder
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
            EmploymentType::create(['name' => $type]);
        }
    }
}

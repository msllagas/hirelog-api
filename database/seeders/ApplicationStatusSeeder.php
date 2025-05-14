<?php

namespace Database\Seeders;

use App\Models\ApplicationStatus;
use Illuminate\Database\Seeder;

class ApplicationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'Pending',
            'In Review',
            'Interview Scheduled',
            'Offer Received',
            'Accepted',
            'Rejected',
            'Withdrawn',
        ];

        foreach ($statuses as $status) {
            ApplicationStatus::create(['name' => $status]);
        }
    }
}

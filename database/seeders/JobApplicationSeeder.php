<?php

namespace Database\Seeders;

use App\Models\ApplicationStatus;
use App\Models\JobApplication;
use App\Models\JobType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Str;

class JobApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $jobTypes = JobType::all();
        $statuses = ApplicationStatus::all();

        if ($users->isEmpty() || $jobTypes->isEmpty() || $statuses->isEmpty()) {
            $this->command->warn('Seed users, job_types, and application_statuses before running JobApplicationSeeder.');

            return;
        }

        foreach (range(1, 20) as $ignored) {
            JobApplication::create([
                'user_id' => $users->random()->id,
                'job_type_id' => $jobTypes->random()->id,
                'company_name' => 'Company '.Str::random(5),
                'position' => 'Position '.Str::random(4),
                'application_status_id' => $statuses->random()->id,
            ]);
        }
    }
}

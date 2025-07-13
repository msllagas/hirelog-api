<?php

namespace App\Providers;

use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Gate::define('save-job', fn (User $user, JobApplication $jobApplication) => $user->id === $jobApplication->user_id);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

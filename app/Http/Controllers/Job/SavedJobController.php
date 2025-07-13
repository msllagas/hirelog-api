<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSavedJobRequest;
use App\Http\Requests\UpdateSavedJobRequest;
use App\Models\JobApplication;
use App\Models\SavedJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SavedJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SavedJob::whereUserId(Auth::id())
            ->paginate(12);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSavedJobRequest $request)
    {
        $savedJobData = $request->validated();

        $jobApplicationId = $savedJobData['job_application_id'];

        $jobApplication = JobApplication::find($jobApplicationId);

        Gate::authorize('save-job', $jobApplication);

        return SavedJob::create(array_merge($savedJobData, ['user_id' => Auth::id()]));

    }

    /**
     * Display the specified resource.
     */
    public function show(SavedJob $savedJob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSavedJobRequest $request, SavedJob $savedJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SavedJob $savedJob)
    {
        //
    }
}

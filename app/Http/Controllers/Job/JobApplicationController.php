<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Http\Requests\Job\StoreJobApplicationRequest;
use App\Http\Requests\Job\UpdateJobApplicationRequest;
use App\Http\Resources\JobApplicationResource;
use App\Models\JobApplication;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        // todo -> add check and return proper error response if Auth::id() is null
        $jobApplications = JobApplication::whereUserId(Auth::id())
            ->with(['jobType', 'applicationStatus', 'savedJob'])
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return JobApplicationResource::collection($jobApplications);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobApplicationRequest $validatedRequest): JobApplicationResource
    {
        $validatedRequest = $validatedRequest->validated();
        $jobApplication = JobApplication::create($validatedRequest);

        return new JobApplicationResource($jobApplication);
    }

    /**
     * Display the specified resource.
     */
    public function show(JobApplication $jobApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobApplicationRequest $request, JobApplication $jobApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): Response|JsonResponse|ResponseFactory
    {
        $jobApplication = JobApplication::find($id);

        if (! $jobApplication) {
            return response()->json([
                'message' => "Job application with ID {$id} not found",
            ], Response::HTTP_NOT_FOUND);
        }

        try {
            $deleted = $jobApplication->delete();

            if (! $deleted) {
                return response()->json(
                    [
                        'message' => "Failed to delete job application with ID {$id}.",
                    ], Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }

            return response()->json([
                'message' => "Job application with id {$id} has been deleted successfully.",
            ], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => "An error occurred while deleting job application with ID {$id}.",
            ]);

        }
    }
}

<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\Job\ApplicationStatusController;
use App\Http\Controllers\Job\JobApplicationController;
use App\Http\Controllers\Job\JobTypeController;
use App\Http\Controllers\Job\SavedJobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hello', function () {
    return 'Hello World!';
});

// Auth-related routes
Route::post('login', LoginController::class)->middleware('guest');
Route::post('signup', SignupController::class)->middleware('guest');
Route::post('logout', LogoutController::class)->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResources([
        'job-applications' => JobApplicationController::class,
        'job-types' => JobTypeController::class,
        'application-statuses' => ApplicationStatusController::class,
        'saved-jobs' => SavedJobController::class,
    ]);
});

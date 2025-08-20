<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignUpRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SignUpController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SignUpRequest $request)
    {

        $user = User::create($request->validated());

        if (! $user) {
            return response()->json(['message' => 'User creation failed'], 500);
        }

        Auth::login($user);

        return $user;
    }
}

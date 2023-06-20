<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function action(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        
        if (auth()->attempt($request->only('email', 'password'))) {
            $currentUser = auth()->user();
            
            return (new UserResource($currentUser))->additional([
                'meta' => [
                    'token' => $currentUser->api_token, //get berdasarkan api_token
                ],
            ]);
        }

        return response()->json([
            'email' => ['The provided credentials do not match our records.'],
        ], 401);
    }
}
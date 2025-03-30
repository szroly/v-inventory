<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return [
            'message' => 'Logged out'
        ];
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad credentials'
            ], 401);
        }

        $token = $user->createToken
        (
            'myapptoken'
        )->plainTextToken;

        $response = [
            'user' => $user,
            'jwt' => $token
        ];

        return response($response, 201);
    }



    public function check(Request $request)
    {
        if (!$request->bearerToken()) {
            return response([
                'message' => 'No token provided'
            ], 401);
        }

        try {
            $user = $request->user();
            
            if (!$user) {
                return response([
                    'message' => 'Invalid token'
                ], 401);
            }
    
            return response([
                'user' => $user,
                'message' => 'Token is valid'
            ], 200);
            
        } catch (\Exception $e) {
            return response([
                'message' => 'Token validation failed',
                'error' => $e->getMessage()
            ], 401);
        }
    }

    public function refresh(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response([
                'message' => 'Unauthenticated'
            ], 401);
        }

        $request->user()->currentAccessToken()->delete();

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response([
            'user' => $user,
            'jwt' => $token,
            'message' => 'Token refreshed'
        ], 201);
    }

}

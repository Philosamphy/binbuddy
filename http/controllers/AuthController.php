<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'message' => 'Login successful',
                'user' => $user,
            ]);
        }

    return response()->json([
    'message' => 'Login successful',
    'user' => [
        'id' => $user->id,
        'fullname' => $user->fullname,
        'email' => $user->email,
        'location' => $user->location,
        'phone_number' => $user->phone_number,
        'birthday' => $user->birthday,
        'gender' => $user->gender,
        'password' => $user->password,
        'points' => $user->points, 
        'created_at' => $user->created_at,
        'updated_at' => $user->updated_at,
    ]
], 401);
    }
}
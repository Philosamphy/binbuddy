<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
           'fullname' => 'required|string|max:255',
           'email' => 'required|email|unique:users,email',
           'location' => 'required|string',
           'phone_number' => 'required|string',
           'birthday' => 'required|date',
           'gender' => 'required|in:Male,Female',
           'password' => 'required|string|min:6',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }
}

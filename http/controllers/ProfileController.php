<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'location' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'birthday' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->fullname = $validated['fullname'];
        $user->email = $validated['email'];
        $user->location = $validated['location'];
        $user->phone_number = $validated['phone_number'];
        $user->birthday = $validated['birthday'];
        $user->gender = $validated['gender'];

        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}

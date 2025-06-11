<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addPoints(Request $request)
{
    $user = $request->user();

    $user->points += 10;
    $user->save();

    return response()->json(['points' => $user->points]);
}

}

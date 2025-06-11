<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Streak;
use Illuminate\Support\Facades\Auth;

class StreakController extends Controller
{
    public function store(Request $request){
        $request->validate([
           'level' => 'required|integer',
           'item_name' => 'required|string',
           'image' => 'required|image|max:2048',
        ]);

        $user = Auth::user();

        if(!$user){
          return response()->json(['message' => 'Unauthorized'], 401);
        }

        if($user->streaks()->where('level', $request->level)->exists()){
            return response()->json(['message' => 'Streak already submitted'], 200);
        }

        $path = $request->file('image')->store('streaks', 'public');

        Streak::create([
          'user_id' => $user->id,
          'level' => $request->level,
          'item_name' => $request->item_name,
          'image_path' => $path
        ]);

        $user->points += 10;
        $user->save();

        return response()->json([
          'message' => 'Streak submitted',
          'newPoints' => $user->points,
          'completedLevels' => $user->streaks()->pluck('level')
        ]);
    }

    public function completedLevels(){
      $user = Auth::user();
        if (!$user){
          return response()->json(['message' => 'Unauthorized'], 401);
        }

        return response()->json($user->streak()->pluck('level'));
    }
}

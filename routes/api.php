<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StreakController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[RegisterController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login',[AuthController::class, 'login']);

Route::post('/add-points', [UserController::class, 'addPoints']);

Route::middleware('auth:sanctum')->post('/submit-streak', [StreakController::class, 'store']);
Route::middleware('auth:sanctum')->get('/completed-levels', [StreakController::class, 'completedLevels']);

Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return $request->user();
});

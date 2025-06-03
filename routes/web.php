<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/homepage', function () {
    return view('homepage');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/reward', function () {
    return view('reward');
});

Route::get('/search', function () {
    return view('search');
});

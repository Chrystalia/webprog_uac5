<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MatchUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/login');

Route::get('/register', function() {
    return view('register');
});
Route::post('/register', [LoginController::class, 'store'])->middleware('guest');

Route::get('/login', function() {
    return view('login');
});
Route::post('/login', [LoginController::class, 'login']);

Route::post('/registration-payment', [LoginController::class, 'payment']);

Route::get('/dashboard', [MatchUserController::class, 'index'])->middleware('auth');
Route::put('/top-up', [UserController::class, 'topup'])->middleware('auth');
Route::post('/like/{id}',  [MatchUserController::class, 'like'])->middleware('auth');
Route::post('/dislike/{id}',  [MatchUserController::class, 'dislike'])->middleware('auth');

Route::get('/match',  [MatchUserController::class, 'match'])->middleware('auth');
Route::get('/liked', [MatchUserController::class, 'liked'])->middleware('auth');
Route::get('/chat/{id}', [MatchUserController::class, 'chat'])->middleware('auth');

Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

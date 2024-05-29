<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TvController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [HomeController::class, 'loginPage'])->name('login')->middleware('guest');
Route::get('/register', [HomeController::class, 'registerPage'])->middleware('guest');

Route::get('/movies', [MovieController::class, 'list']);
Route::get('/movies/{id}', [MovieController::class, 'show']);

Route::get('/tv', [TvController::class, 'list']);
Route::get('/tv/{id}', [TvController::class, 'show']);

Route::get('/profil', [UserController::class, 'profilPage']);
Route::post('/profil', [UserController::class, 'profil']);
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

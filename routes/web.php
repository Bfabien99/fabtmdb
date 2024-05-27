<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TvController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [HomeController::class, 'loginPage']);
Route::get('/register', [HomeController::class, 'registerPage']);

Route::get('/movies', [MovieController::class, 'list']);
Route::get('/movies/{id}', [MovieController::class, 'show']);

Route::get('/tv', [TvController::class, 'list']);
Route::get('/tv/{id}', [TvController::class, 'show']);


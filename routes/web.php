<?php

use App\Http\Controllers\MarkerController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.homepage')->name('homepage');
Route::view('/contact', 'pages.contact')->name('contact');

Route::group(['middleware' => 'auth:web'], function () {
    Route::resource('marker', MarkerController::class);
});

// User Routes
Route::get('/profile/{user:username}', ProfileController::class)
    ->name('profile');

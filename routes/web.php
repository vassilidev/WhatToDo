<?php

use App\Http\Controllers\MarkerController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SettingsController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.homepage')->name('homepage');
Route::view('/contact', 'pages.contact')->name('contact');

Route::group(['middleware' => 'auth:web'], function () {
    Route::resource('marker', MarkerController::class);

    Route::get('settings', [SettingsController::class, 'settings'])->name('settings');
});

// User Routes
Route::get('/profile/{user:username}', ProfileController::class)
    ->name('profile');

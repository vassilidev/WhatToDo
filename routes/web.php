<?php

use App\Http\Controllers\Marker\GetMarkersController;
use App\Http\Controllers\User\FollowersController;
use App\Http\Controllers\MarkerController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SettingsController;
use App\Models\Marker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.homepage')->name('homepage');
Route::view('/contact', 'pages.contact')->name('contact');

Route::group(['middleware' => 'auth:web'], function () {
    Route::resource('marker', MarkerController::class);

    Route::get('settings', [SettingsController::class, 'settings'])->name('settings');

    Route::prefix('/user/{user:username}')->name('user.')->group(function () {
        Route::get('/getFollowers', [FollowersController::class, 'getFollowers'])
            ->name('getFollowers');

        Route::get('/getFollowings', [FollowersController::class, 'getFollowings'])
            ->name('getFollowings');

        Route::get('/searchFollowers', [FollowersController::class, 'searchFollowers'])
            ->name('searchFollowers');

        Route::get('/searchFollowings', [FollowersController::class, 'searchFollowings'])
            ->name('searchFollowers');
    });
});

Route::get('/getMarkers', GetMarkersController::class)
    ->name('getMarkers');

// User Routes
Route::get('/profile/{user:username}', ProfileController::class)
    ->name('profile');

Route::get('/test', function () {
    /*$start = microtime(true);

    for ($i = 0; $i <= 10000; $i++) {

    }
    echo microtime(true) - $start;*/
    dump((new \App\Services\GetMarkersService())->getMarkersFor(\App\Models\User::find(3)));
});

<?php

use App\Http\Controllers\Api\Marker\GetMarkersController;

Route::get('/getMarkers', GetMarkersController::class)
    ->name('getMarkers');

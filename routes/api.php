<?php

use App\Http\Controllers\Api\GetMarkersController;

Route::get('/getMarkers', GetMarkersController::class)->name('getMarkers');

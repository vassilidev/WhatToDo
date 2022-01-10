<?php

namespace App\Http\Controllers\Marker;

use App\Http\Controllers\Controller;
use App\Services\GetMarkersService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class GetMarkersController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return Collection|JsonResponse
     */
    public function __invoke()
    {
        $markers = (new GetMarkersService())->getMarkers();

        if (request()->wantsJson()) {
            return response()->json($markers);
        }

        return $markers;
    }
}

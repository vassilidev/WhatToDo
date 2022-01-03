<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Marker;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class GetMarkersController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return Collection|Marker[]
     */
    public function __invoke()
    {
        $markers = Marker::select('id', 'user_id', 'slug', 'name', 'description', 'lat', 'long')
            ->with('user:id,username')
            ->get();

        return $markers;
    }
}

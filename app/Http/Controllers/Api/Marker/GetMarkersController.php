<?php

namespace App\Http\Controllers\Api\Marker;

use App\Http\Controllers\Controller;
use App\Models\Marker;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Str;

class GetMarkersController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return Collection|Marker[]
     */
    public function __invoke()
    {
        $markers = Marker::query()
            ->select('id', 'user_id', 'slug', 'name', 'description', 'lat', 'long', 'created_at')
            ->with('user:id,username')
            ->get()
            ->each(function (Marker $marker) {
                $marker->description = Str::limit($marker->description, 200);
                $marker->created_diff = $marker->created_at->diffForHumans();
            });

        return $markers;
    }
}

<?php

namespace App\Services;

use App\Models\Marker;
use App\Models\User;
use Auth;
use Illuminate\Database\Eloquent\Builder;

class GetMarkersService
{
    public function getPublicMarkers()
    {
        return Marker::query()
            ->validated()
            ->select('id', 'user_id', 'slug', 'name', 'description', 'lat', 'long', 'created_at')
            ->with('user:id,username')
            ->where(fn(Builder $query) => $query->public());
    }

    public function getMarkers()
    {
        $markers = $this->getPublicMarkers();

        if (Auth::check()) {
            $markers = $markers
                ->orWhere(fn(Builder $query) => $query->members())
                ->orWhere(function (Builder $query) {
                    $query
                        ->where('visibility', 'followers')
                        ->whereHas('user', function (Builder $query) {
                            $query->whereIn('user_id', Auth::user()->followings()->accepted()->pluck('users.id'));
                        });
                })
                ->orWhere(function (Builder $query) {
                    $query
                        ->where('visibility', 'custom')
                        ->whereHas('invitedUsers', function (Builder $query) {
                            $query->where('users.id', Auth::id());
                        });
                })
                ->orWhere('user_id', Auth::id());
        }

        return $markers->get();
    }

    public function getMarkersFor(User $user)
    {
        $visibility = Auth::check()
        ? ['public']
        : ['public', 'members'];

        $markers = $user->markers()
            ->validated()
            ->whereIn('visibility', $visibility)
            ->orWhere(function (Builder $query) {
                $query
                    ->where('visibility', 'followers')
                    ->whereHas('user', function (Builder $query) {
                        $query->whereIn('user_id', Auth::user()->followings()->accepted()->pluck('users.id'));
                    });
            })
            ->orWhere(function (Builder $query) {
                $query
                    ->where('visibility', 'custom')
                    ->whereHas('invitedUsers', function (Builder $query) {
                        $query->where('users.id', Auth::id());
                    });
            });

        return $markers->get();

    }

}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Spatie\Searchable\Search;
use Spatie\Searchable\SearchResultCollection;

class FollowersController extends Controller
{
    /**
     * @param User $user
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function getFollowers(User $user): JsonResponse
    {
        $this->authorize('getFollowers', $user);

        $followers = $user->followers()->select('users.id', 'name', 'surname', 'username')->get();
        $followers = Auth::user()->attachFollowStatus($followers);

        return response()->json($followers);
    }

    /**
     * @param User $user
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function getFollowings(User $user): JsonResponse
    {
        $this->authorize('getFollowers', $user);

        $followings = $user->followings()->select('users.id', 'name', 'surname', 'username')->get();
        $followings = Auth::user()->attachFollowStatus($followings);

        return response()->json($followings);
    }

    public function searchFollowers(User $user, $term = ''): SearchResultCollection
    {
        $followers = $user->followers();

        return (new Search())
            ->registerModel(User::class, ['name', 'surname', 'username'])
            ->search($term);
    }
}

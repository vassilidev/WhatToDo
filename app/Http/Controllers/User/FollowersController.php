<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

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

        return response()->json($followings);
    }

    /**
     * @param User $user
     * @return Collection|JsonResponse
     * @throws AuthorizationException
     */
    public function searchFollowers(User $user)
    {
        $this->authorize('searchFollowers', $user);

        $followers = $user->followers()->search(['username', 'name', 'surname'], request('search') ?? '');

        if (request()->wantsJson()) {
            return response()->json($followers);
        }

        return $followers;
    }

    /**
     * @param User $user
     * @return Collection|JsonResponse
     * @throws AuthorizationException
     */
    public function searchFollowings(User $user)
    {
        $this->authorize('searchFollowers', $user);

        $followings = $user->followings()
            ->accepted()
            ->search(['username', 'name', 'surname'], request('search') ?? '')
            ->get();

        if (request()->wantsJson()) {
            return response()->json($followings);
        }

        return $followings;
    }
}

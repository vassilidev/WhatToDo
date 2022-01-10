<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Followable
{
    /*
        * Determines whether the user should accept follow requests
        */
    public function needsToApproveFollowRequests(): bool
    {
        return !$this->isPublic();
    }

    public function follow(User $user)
    {
        $this->followings()->attach($user, [
            'accepted_at' => $user->needsToApproveFollowRequests() ? null : now(),
        ]);
    }

    public function unfollow(User $user)
    {
        $this->followings()->detach($user);
    }

    public function toggleFollow(User $user)
    {
        $this->isFollowing($user)
            ? $this->unfollow($user)
            : $this->follow($user);
    }

    public function rejectFollowRequest(User $user)
    {
        $this->followers()->detach($user);
    }

    public function acceptFollowRequest(User $user)
    {
        $this->followers()->updateExistingPivot($user, [
            'accepted_at' => now(),
        ]);
    }

    public function hasRequestedToFollow(User $user): bool
    {
        if ($this->relationLoaded('followings')) {
            return $this->followings
                ->where('pivot.accepted_at', '===', null)
                ->contains($user);
        }

        return $this->followings()
            ->wherePivot('accepted_at', null)
            ->where('users.id', $user->id)
            ->exists();
    }

    public function isFollowing(User $user): bool
    {
        if ($this->relationLoaded('followings')) {
            return $this->followings
                ->where('pivot.accepted_at', '!==', null)
                ->contains($user);
        }

        return $this->followings()
            ->wherePivotNotNull('accepted_at')
            ->where('users.id', $user->id)
            ->exists();
    }

    public function isFollowedBy(User $user): bool
    {
        if ($this->relationLoaded('followers')) {
            return $this->followers
                ->where('pivot.accepted_at', '!==', null)
                ->contains($user);
        }

        return $this->followers()
            ->wherePivotNotNull('accepted_at')
            ->where('users.id', $user->id)
            ->exists();
    }

    public function areFollowingEachOther(User $user): bool
    {
        return $this->isFollowing($user) && $this->isFollowedBy($user);
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'user_follower',
            'following_id',
            'follower_id',
        )->withPivot('accepted_at')->withTimestamps();
    }

    public function followings(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'user_follower',
            'follower_id',
            'following_id',
        )->withPivot('accepted_at')->withTimestamps();
    }

    public function scopeAccepted(Builder $query): Builder
    {
        return $query->whereNotNull('accepted_at');
    }

    public function scopeWaiting(Builder $query): Builder
    {
        return $query->whereNull('accepted_at');
    }

    public function scopeSearch(Builder $query, $columns, string $search, int $limit = 10): Builder
    {
        $search = "%{$search}%";

        if (!is_array($columns)) {
            $result = $query->where($columns, 'LIKE', $search);
        } else {
            foreach ($columns as $i => $column) {
                if ($i == 0) {
                    $result = $query->where($column, 'LIKE', $search);
                } else {
                    $result = $query->orWhere($column, 'LIKE', $search);
                }
            }
        }

        return $result->limit($limit);
    }

}

<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param User $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param User $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param User $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param User $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param User $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can see model's followers.
     *
     * @param User $user
     * @param User $model
     * @return bool
     */
    public function getFollowers(User $user, User $model): bool
    {
        return (
            $model->isFollowedBy($user)
            || $user->id == $model->id
            || $model->isPublic()
        );
    }

    /**
     * Determine whether the user can search in model's followers.
     *
     * @param User $user
     * @param User $model
     * @return bool
     */
    public function searchFollowers(User $user, User $model): bool
    {
        return (
            $model->isFollowedBy($user)
            || $user->id == $model->id
            || $model->isPublic()
        );
    }
}

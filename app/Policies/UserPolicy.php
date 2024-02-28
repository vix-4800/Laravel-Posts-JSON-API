<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        //
    }

    public function viewPosts(User $user, User $model): bool
    {
        //
    }

    public function viewComments(User $user, User $model): bool
    {
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        //
    }

    public function updatePosts(User $user, User $model): bool
    {
        //
    }

    public function updateComments(User $user, User $model): bool
    {
        //
    }

    public function attachPosts(User $user, User $model): bool
    {
        //
    }

    public function attachComments(User $user, User $model): bool
    {
        //
    }

    public function detachPosts(User $user, User $model): bool
    {
        //
    }

    public function detachComments(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        //
    }
}

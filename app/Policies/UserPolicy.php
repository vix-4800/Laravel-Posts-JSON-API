<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, User $model): bool
    {
        return true;
    }

    public function viewPosts(?User $user, User $model): bool
    {
        return $this->view($user, $model);
    }

    public function viewComments(?User $user, User $model): bool
    {
        return $this->view($user, $model);
    }
}

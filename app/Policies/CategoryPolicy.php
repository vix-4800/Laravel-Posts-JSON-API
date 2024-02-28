<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CategoryPolicy
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
    public function view(?User $user, Category $category): bool
    {
        return true;
    }

    public function viewPosts(?User $user, Category $category): bool
    {
        return $this->view($user, $category);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Category $category): bool
    {
        return Auth::check();
    }

    public function updatePosts(User $user, Category $category): bool
    {
        return $this->update($user, $category);
    }

    public function attachPosts(User $user, Category $category): bool
    {
        return $this->update($user, $category);
    }

    public function detachPosts(User $user, Category $category): bool
    {
        return $this->update($user, $category);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Category $category): bool
    {
        return true;
    }
}

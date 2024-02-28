<?php

namespace App\Policies;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TagPolicy
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
    public function view(?User $user, Tag $tag): bool
    {
        return true;
    }

    public function viewPosts(?User $user, Tag $tag): bool
    {
        return $this->view($user, $tag);
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
    public function update(User $user, Tag $tag): bool
    {
        return Auth::check();
    }

    public function updatePosts(User $user, Tag $tag): bool
    {
        return $this->update($user, $tag);
    }

    public function attachPosts(User $user, Tag $tag): bool
    {
        return $this->update($user, $tag);
    }

    public function detachPosts(User $user, Tag $tag): bool
    {
        return $this->update($user, $tag);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Tag $tag): bool
    {
        return $this->update($user, $tag);
    }
}

<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
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
    public function view(?User $user, Post $post): bool
    {
        if ($post->published_at) {
            return true;
        }

        return $user && $user->is($post->author);
    }

    /**
     * Determine whether the user can view the post's author.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAuthor(?User $user, Post $post)
    {
        return $this->view($user, $post);
    }

    /**
     * Determine whether the user can view the post's comments.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewComments(?User $user, Post $post)
    {
        return $this->view($user, $post);
    }

    /**
     * Determine whether the user can view the post's tags.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewTags(?User $user, Post $post)
    {
        return $this->view($user, $post);
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
    public function update(User $user, Post $post): bool
    {
        return $user->is($post->author);
    }

    /**
     * Determine whether the user can update the model's tags relationship.
     *
     * @return bool|\Illuminate\Auth\Access\Response
     */
    public function updateTags(User $user, Post $post)
    {
        return $this->update($user, $post);
    }

    /**
     * Determine whether the user can attach tags to the model's tags relationship.
     *
     * @return bool|\Illuminate\Auth\Access\Response
     */
    public function attachTags(User $user, Post $post)
    {
        return $this->update($user, $post);
    }

    /**
     * Determine whether the user can detach tags from the model's tags relationship.
     *
     * @return bool|\Illuminate\Auth\Access\Response
     */
    public function detachTags(User $user, Post $post)
    {
        return $this->update($user, $post);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        return $this->update($user, $post);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        //
    }
}

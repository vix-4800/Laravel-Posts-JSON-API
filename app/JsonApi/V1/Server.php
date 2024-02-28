<?php

namespace App\JsonApi\V1;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use LaravelJsonApi\Core\Server\Server as BaseServer;

class Server extends BaseServer
{
    /**
     * The base URI namespace for this server.
     */
    protected string $baseUri = '/api/v1';

    /**
     * Bootstrap the server when it is handling an HTTP request.
     */
    public function serving(): void
    {
        Auth::shouldUse('sanctum');

        Post::creating(static function (Post $post): void {
            $post->author()->associate(Auth::user());
        });

        Comment::creating(static function (Comment $comment): void {
            $comment->user()->associate(Auth::user());
        });
    }

    /**
     * Get the server's list of schemas.
     */
    protected function allSchemas(): array
    {
        return [
            Posts\PostSchema::class,
            Tags\TagSchema::class,
            Users\UserSchema::class,
            Comments\CommentSchema::class,
            Categories\CategorySchema::class,
        ];
    }
}

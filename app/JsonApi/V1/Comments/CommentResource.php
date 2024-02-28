<?php

namespace App\JsonApi\V1\Comments;

use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

class CommentResource extends JsonApiResource
{
    /**
     * Get the resource's attributes.
     *
     * @param  Request|null  $request
     */
    public function attributes($request): iterable
    {
        return [
            'content' => $this->content,
        ];
    }

    /**
     * Get the resource's meta.
     *
     * @param  \Illuminate\Http\Request|null  $request
     */
    public function meta($request): iterable
    {
        return [
            'written_at' => $this->created_at,
        ];
    }

    /**
     * Get the resource's relationships.
     *
     * @param  Request|null  $request
     */
    public function relationships($request): iterable
    {
        return [
            $this->relation('user'),
            $this->relation('post'),
        ];
    }
}

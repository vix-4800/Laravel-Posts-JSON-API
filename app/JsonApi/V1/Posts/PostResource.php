<?php

namespace App\JsonApi\V1\Posts;

use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

class PostResource extends JsonApiResource
{
    /**
     * Get the resource's attributes.
     *
     * @param  Request|null  $request
     */
    public function attributes($request): iterable
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
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
            'published_at' => $this->published_at,
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
            $this->relation('author'),
            $this->relation('comments'),
            $this->relation('categories'),
            $this->relation('tags'),
        ];
    }
}

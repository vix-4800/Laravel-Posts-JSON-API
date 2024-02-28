<?php

namespace App\JsonApi\V1\Users;

use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

class UserResource extends JsonApiResource
{
    /**
     * Get the resource's attributes.
     *
     * @param  Request|null  $request
     */
    public function attributes($request): iterable
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
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
            'registered_at' => $this->created_at,
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
            $this->relation('posts'),
            $this->relation('comments'),
        ];
    }
}

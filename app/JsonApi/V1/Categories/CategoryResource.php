<?php

namespace App\JsonApi\V1\Categories;

use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

class CategoryResource extends JsonApiResource
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
        ];
    }
}

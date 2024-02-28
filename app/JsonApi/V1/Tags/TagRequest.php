<?php

namespace App\JsonApi\V1\Tags;

use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;

class TagRequest extends ResourceRequest
{
    /**
     * Get the validation rules for the resource.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
        ];
    }
}

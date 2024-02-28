<?php

namespace App\JsonApi\V1\Posts;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class PostRequest extends ResourceRequest
{
    /**
     * Get the validation rules for the resource.
     */
    public function rules(): array
    {
        $post = $this->model();
        $uniqueSlug = Rule::unique('posts', 'slug');

        if ($post) {
            $uniqueSlug->ignoreModel($post);
        }

        return [
            'title' => ['required', 'string'],
            'slug' => ['required', 'string', $uniqueSlug],
            'content' => ['required', 'string'],
            'tags' => JsonApiRule::toMany(),
            'published_at' => ['nullable', JsonApiRule::dateTime()],
        ];
    }
}

<?php

namespace App\JsonApi\V1\Posts;

use App\Models\Post;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsTo;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsToMany;
use LaravelJsonApi\Eloquent\Fields\Relations\HasMany;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Filters\WhereIdIn;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Schema;

class PostSchema extends Schema
{
    /**
     * The model the schema corresponds to.
     */
    public static string $model = Post::class;

    /**
     * The maximum include path depth.
     *
     * @var int
     */
    protected int $maxDepth = 3;

    /**
     * Get the resource fields.
     */
    public function fields(): array
    {
        return [
            ID::make(),

            Str::make('title')->sortable(),
            Str::make('slug'),
            Str::make('content'),
            DateTime::make('published_at')->readOnly(),

            BelongsTo::make('author')->type('users')->readOnly(),
            HasMany::make('comments')->readOnly(),
            BelongsToMany::make('tags'),

            DateTime::make('createdAt')->sortable()->readOnly(),
            DateTime::make('updatedAt')->sortable()->readOnly(),
        ];
    }

    /**
     * Get the resource filters.
     */
    public function filters(): array
    {
        return [
            WhereIdIn::make($this),
        ];
    }

    /**
     * Get the resource paginator.
     */
    public function pagination(): ?Paginator
    {
        return PagePagination::make();
    }
}
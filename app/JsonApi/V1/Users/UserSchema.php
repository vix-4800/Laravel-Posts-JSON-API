<?php

namespace App\JsonApi\V1\Users;

use App\JsonApi\Filters\WhereLikeFilter;
use App\Models\User;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Relations\HasMany;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Filters\WhereIdIn;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Schema;

class UserSchema extends Schema
{
    /**
     * The model the schema corresponds to.
     */
    public static string $model = User::class;

    /**
     * Get the resource fields.
     */
    public function fields(): array
    {
        return [
            ID::make(),

            Str::make('name')->readOnly()->sortable(),
            Str::make('email')->readOnly()->sortable(),
            DateTime::make('email_verified_at')->readOnly()->notSortable(),

            HasMany::make('posts')->readOnly(),
            HasMany::make('comments')->readOnly(),

            DateTime::make('created_at')->sortable()->readOnly(),
            DateTime::make('updated_at')->sortable()->readOnly(),
        ];
    }

    /**
     * Get the resource filters.
     */
    public function filters(): array
    {
        return [
            WhereIdIn::make($this),
            WhereLikeFilter::make('name'),
            WhereLikeFilter::make('email'),
        ];
    }

    /**
     * Get the resource paginator.
     */
    public function pagination(): ?Paginator
    {
        return PagePagination::make()
            ->withPageKey('page')
            ->withPerPageKey('limit')
            ->withDefaultPerPage(15);
    }
}

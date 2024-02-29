<?php

namespace App\JsonApi\Filters;

use LaravelJsonApi\Core\Support\Str;
use LaravelJsonApi\Eloquent\Contracts\Filter;
use LaravelJsonApi\Eloquent\Filters\Concerns\DeserializesValue;
use LaravelJsonApi\Eloquent\Filters\Concerns\IsSingular;

class WhereLikeFilter implements Filter
{
    use DeserializesValue;
    use IsSingular;

    private string $name;

    private string $column;

    /**
     * Create a new filter.
     */
    public static function make(string $name, ?string $column = null): self
    {
        return new static($name, $column);
    }

    /**
     * WhereLikeFilter constructor.
     */
    public function __construct(string $name, ?string $column = null)
    {
        $this->name = $name;
        $this->column = $column ?: Str::underscore($name);
    }

    /**
     * Get the key for the filter.
     */
    public function key(): string
    {
        return $this->name;
    }

    /**
     * Apply the filter to the query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply($query, $value)
    {
        return $query->where(
            $this->column,
            'LIKE',
            '%'.$value.'%'
        );
    }
}

<?php

namespace Sfneal\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class OrderScope implements Scope
{
    /**
     * @var string Name of the column that identifies order
     */
    private $column;

    /**
     * @var string Direction to order results (asc or desc)
     */
    private $direction;

    /**
     * @var bool Raw OrderBy clause to order null values last
     */
    private $raw;

    /**
     * OrderOrderScope constructor.
     *
     * @param string $column
     * @param string $direction
     * @param bool $raw
     */
    public function __construct(string $column = 'order', string $direction = 'desc', $raw = false)
    {
        $this->column = $column;
        $this->direction = ucwords($direction);
        $this->raw = $raw;
    }

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  Builder  $builder
     * @param  Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        // Use '-' prefix to order NULL values last
        if ($this->raw) {
            $builder->orderByRaw("-`{$this->column}` desc");
            $builder->orderBy($this->column, $this->direction);
        }

        // Standard orderBy clause
        else {
            $builder->orderBy($this->column, $this->direction);
        }
    }
}

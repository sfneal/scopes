<?php

namespace Sfneal\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class IdOrderScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  Builder  $builder
     * @param  Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        // Order returned collection by project_id (largest to smallest)
        $builder->orderBy($model->getKeyName(), 'desc');
    }
}

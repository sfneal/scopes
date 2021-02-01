<?php

namespace Sfneal\Scopes\Tests\Models;

use Sfneal\Scopes\CreatedOrderScope;

class PeopleOrderedByCreatedAt extends People
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // Global scopes
        static::addGlobalScope(new CreatedOrderScope());
    }
}

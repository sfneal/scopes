<?php

namespace Sfneal\Scopes\Tests\Models;

use Sfneal\Scopes\IdOrderScope;

class PeopleOrderedById extends People
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
        static::addGlobalScope(new IdOrderScope());
    }
}

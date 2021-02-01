<?php

namespace Sfneal\Scopes\Tests\Models;

use Sfneal\Scopes\OrderScope;

class PeopleOrderedByLastName extends People
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
        static::addGlobalScope(new OrderScope('name_last'));
    }
}

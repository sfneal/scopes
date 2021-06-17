<?php

namespace Sfneal\Scopes\Tests\Assets\Models;

use Sfneal\Scopes\IdOrderScope;
use Sfneal\Testing\Models\People;

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

<?php

namespace Sfneal\Scopes\Tests;

use Sfneal\Scopes\Tests\Models\People;
use Sfneal\Scopes\Tests\Models\PeopleOrderedByLastName;

class CustomOrderScopeTest extends TestCase
{
    /** @test */
    public function query_is_being_correctly_scoped()
    {
        $expected = People::query()
            ->orderBy('name_last', 'desc')
            ->get();

        $actual = PeopleOrderedByLastName::query()->get();

        $this->assertEquals($expected->toArray(), $actual->toArray());
    }

    /** @test */
    public function query_is_not_being_incorrectly_scoped()
    {
        $expected = People::query()
            ->orderBy('name_last', 'asc')
            ->get();

        $actual = PeopleOrderedByLastName::query()->get();

        $this->assertNotEquals($expected->toArray(), $actual->toArray());
    }
}

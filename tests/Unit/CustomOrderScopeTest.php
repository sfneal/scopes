<?php

namespace Sfneal\Scopes\Tests\Unit;

use Sfneal\Scopes\Tests\Assets\Models\PeopleOrderedByLastName;
use Sfneal\Scopes\Tests\TestCase;
use Sfneal\Testing\Models\People;

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

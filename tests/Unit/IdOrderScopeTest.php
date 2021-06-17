<?php

namespace Sfneal\Scopes\Tests\Unit;

use Sfneal\Scopes\Tests\Assets\Models\PeopleOrderedById;
use Sfneal\Scopes\Tests\TestCase;
use Sfneal\Testing\Models\People;

class IdOrderScopeTest extends TestCase
{
    /** @test */
    public function query_is_being_correctly_scoped()
    {
        $expected = People::query()
            ->orderBy('person_id', 'desc')
            ->get();

        $actual = PeopleOrderedById::query()->get();

        $this->assertEquals($expected->toArray(), $actual->toArray());
    }

    /** @test */
    public function query_is_not_being_incorrectly_scoped()
    {
        $expected = People::query()
            ->orderBy('person_id', 'asc')
            ->get();

        $actual = PeopleOrderedById::query()->get();

        $this->assertNotEquals($expected->toArray(), $actual->toArray());
    }
}

<?php


namespace Sfneal\Scopes\Tests;


use Sfneal\Scopes\Tests\Models\People;
use Sfneal\Scopes\Tests\Models\PeopleOrderedById;

class CreatedOrderScopeTest extends TestCase
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

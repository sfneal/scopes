<?php


namespace Sfneal\Scopes\Tests;


use Sfneal\Scopes\CreatedOrderScope;
use Sfneal\Scopes\Tests\Models\People;
use Sfneal\Scopes\Tests\Models\PeopleOrderedByCreatedAt;

class CreatedOrderScopeTest extends TestCase
{
    /** @test */
    public function query_is_being_correctly_scoped()
    {
        $expected = People::query()
            ->withoutGlobalScope(CreatedOrderScope::class)
            ->orderBy('created_at', 'desc')
            ->get();

        $actual = PeopleOrderedByCreatedAt::query()->get();

        $this->assertEquals($expected->toArray(), $actual->toArray());
    }
}

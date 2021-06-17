<?php

namespace Sfneal\Scopes\Tests\Unit;

use Sfneal\Scopes\Tests\Assets\Models\PeopleOrderedByCreatedAt;
use Sfneal\Scopes\Tests\TestCase;
use Sfneal\Testing\Models\People;

class CreatedOrderScopeTest extends TestCase
{
    /** @test */
    public function query_is_being_correctly_scoped()
    {
        $expected = People::query()
            ->orderBy('created_at', 'desc')
            ->get();

        $actual = PeopleOrderedByCreatedAt::query()->get();

        $this->assertEquals($expected->toArray(), $actual->toArray());
    }
}

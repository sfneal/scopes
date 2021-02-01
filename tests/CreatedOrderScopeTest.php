<?php


namespace Sfneal\Scopes\Tests;


use Sfneal\Scopes\CreatedOrderScope;
use Sfneal\Scopes\Tests\Models\People;

class CreatedOrderScopeTest extends TestCase
{
    /** @test */
    public function query_is_being_correctly_scoped()
    {
        $expected = People::query()
            ->withoutGlobalScope(CreatedOrderScope::class)
            ->orderBy('created_at', 'desc')
            ->get();

        $actual = People::query()->get();

        $this->assertEquals($expected, $actual);
    }
}

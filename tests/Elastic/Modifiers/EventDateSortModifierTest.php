<?php

use Mockery as m;
use Belt\Core\Http\Requests\PaginateRequest;
use Belt\Core\Testing\BeltTestCase;
use Belt\Content\Elastic\ElasticEngine;
use Belt\Spot\Elastic\Modifiers\EventDateSortModifier;

class EventDateSortModifierTest extends BeltTestCase
{
    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Elastic\Modifiers\EventDateSortModifier::modify
     */
    public function test()
    {
        $engine = m::mock(ElasticEngine::class);
        $modifier = new EventDateSortModifier($engine);

        # starts_at
        $this->assertFalse(isset($engine->sort['starts_at']));
        $modifier->modify(new PaginateRequest(['orderBy' => 'starts_at']));
        $this->assertTrue(isset($engine->sort['starts_at']));

        # ends_at
        $this->assertFalse(isset($engine->sort['ends_at']));
        $modifier->modify(new PaginateRequest(['orderBy' => 'ends_at']));
        $this->assertTrue(isset($engine->sort['ends_at']));
    }

}
<?php

use Mockery as m;
use Belt\Core\Http\Requests\PaginateRequest;
use Belt\Core\Testing\BeltTestCase;
use Belt\Content\Elastic\ElasticEngine;
use Belt\Spot\Elastic\Modifiers\EventRangeQueryModifier;

class EventRangeQueryModifierTest extends BeltTestCase
{
    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Elastic\Modifiers\EventRangeQueryModifier::modify
     */
    public function test()
    {
        $engine = m::mock(ElasticEngine::class);
        $modifier = new EventRangeQueryModifier($engine);

        $this->assertFalse(isset($engine->filter[0]['bool']['should']));
        $modifier->modify(new PaginateRequest(['starts_at' => '1999-12-31', 'ends_at' => '1999-12-31']));
        $this->assertTrue(isset($engine->filter[0]['bool']['should']));
    }

}
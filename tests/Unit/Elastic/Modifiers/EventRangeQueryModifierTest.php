<?php namespace Tests\Belt\Spot\Unit\Elastic\Modifiers;

use Mockery as m;
use Belt\Core\Http\Requests\PaginateRequest;
use Belt\Core\Tests\BeltTestCase;
use Belt\Elastic\Engine as ElasticEngine;
use Belt\Spot\Elastic\Modifiers\EventRangeQueryModifier;

class EventRangeQueryModifierTest extends BeltTestCase
{
    public function tearDown()
    {
        m::close();
    }

    private function engine($input = [])
    {
        $engine = m::mock(ElasticEngine::class);

        $modifier = new EventRangeQueryModifier($engine);
        $modifier->modify(new PaginateRequest($input));

        return $engine;
    }

    /**
     * @covers \Belt\Spot\Elastic\Modifiers\EventRangeQueryModifier::modify
     */
    public function test()
    {
        $engine = $this->engine();
        $this->assertFalse(isset($engine->filter[0]['bool']['should']));

        # starts_at only
        $engine = $this->engine(['starts_at' => '1999-01-01']);
        $this->assertTrue(isset($engine->filter[0]['bool']['should'][0]['bool']['should'][0]['range']['starts_at']['gte']));
        $this->assertTrue(isset($engine->filter[0]['bool']['should'][0]['bool']['should'][1]['range']['ends_at']['gte']));

        # ends_at only
        $engine = $this->engine(['ends_at' => '1999-12-31']);
        $this->assertTrue(isset($engine->filter[0]['bool']['should'][0]['bool']['should'][0]['range']['starts_at']['lte']));
        $this->assertTrue(isset($engine->filter[0]['bool']['should'][0]['bool']['should'][1]['range']['ends_at']['lte']));

        # starts_at & ends_at
        $engine = $this->engine(['starts_at' => '1999-01-01', 'ends_at' => '1999-12-31']);
        $this->assertTrue(isset($engine->filter[0]['bool']['should'][0]['range']['starts_at']['lte']));
        $this->assertTrue(isset($engine->filter[0]['bool']['should'][0]['range']['starts_at']['gte']));
        $this->assertTrue(isset($engine->filter[0]['bool']['should'][1]['range']['ends_at']['lte']));
        $this->assertTrue(isset($engine->filter[0]['bool']['should'][1]['range']['ends_at']['gte']));
    }

}
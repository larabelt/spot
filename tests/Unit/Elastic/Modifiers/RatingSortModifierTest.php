<?php namespace Tests\Belt\Spot\Unit\Elastic\Modifiers;

use Mockery as m;
use Belt\Core\Http\Requests\PaginateRequest;
use Belt\Core\Tests\BeltTestCase;
use Belt\Elastic\Engine as ElasticEngine;
use Belt\Spot\Elastic\Modifiers\RatingSortModifier;

class RatingSortModifierTest extends BeltTestCase
{
    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Elastic\Modifiers\RatingSortModifier::modify
     */
    public function test()
    {
        $engine = m::mock(ElasticEngine::class);
        $modifier = new RatingSortModifier($engine);

        $this->assertFalse(isset($engine->sort['rating']));
        $modifier->modify(new PaginateRequest(['orderBy' => 'rating']));
        $this->assertTrue(isset($engine->sort['rating']));
    }

}
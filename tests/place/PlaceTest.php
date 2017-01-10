<?php
use Mockery as m;

use Ohio\Core\Base\Testing\OhioTestCase;
use Ohio\Spot\Place\Place;
use Illuminate\Database\Eloquent\Builder;

class PlaceTest extends OhioTestCase
{
    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Ohio\Spot\Place\Place::setIsSearchableAttribute
     */
    public function test()
    {
        $place = factory(Place::class)->make();

        # is searchable
        $place->setIsSearchableAttribute(' true!!! ');
        $this->assertEquals(true, $place->is_active);

    }

}
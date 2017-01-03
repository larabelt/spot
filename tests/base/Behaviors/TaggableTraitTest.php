<?php

use Mockery as m;

use Ohio\Core\Base\Testing\OhioTestCase;
use Ohio\Spot\Base\Behaviors\PlacegableTrait;
use Ohio\Spot\Place\Place;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class PlacegableTraitTest extends OhioTestCase
{

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Ohio\Spot\Base\Behaviors\PlacegableTrait::places
     */
    public function test()
    {
        # places
        $morphMany = m::mock(Relation::class);
        $morphMany->shouldReceive('orderby')->withArgs(['delta']);
        $pageMock = m::mock(PlacegableTraitTestStub::class . '[morphMany]');
        $pageMock->shouldReceive('morphMany')->withArgs([Place::class, 'placegable'])->andReturn($morphMany);
        $pageMock->shouldReceive('places');
        $pageMock->places();
    }

}

class PlacegableTraitTestStub extends Model
{
    use PlacegableTrait;
}
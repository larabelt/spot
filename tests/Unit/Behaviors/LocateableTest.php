<?php namespace Tests\Belt\Spot\Unit\Behaviors;

use Mockery as m;

use Tests\Belt\Core\BeltTestCase;
use Belt\Spot\Behaviors\Locatable;
use Belt\Spot\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class LocatableTest extends BeltTestCase
{

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Behaviors\Locatable::location
     * @covers \Belt\Spot\Behaviors\Locatable::locations
     */
    public function test()
    {
        # location
        $morphOne = m::mock(Relation::class);
        $morphOne->shouldReceive('orderBy')->withArgs(['delta']);
        $pageMock = m::mock(LocatableTestStub::class . '[morphOne]');
        $pageMock->shouldReceive('morphOne')->withArgs([Location::class, 'locatable'])->andReturn($morphOne);
        $pageMock->shouldReceive('location');
        $pageMock->location();

        # locations
        $morphMany = m::mock(Relation::class);
        $morphMany->shouldReceive('orderBy')->withArgs(['delta']);
        $pageMock = m::mock(LocatableTestStub::class . '[morphMany]');
        $pageMock->shouldReceive('morphMany')->withArgs([Location::class, 'locatable'])->andReturn($morphMany);
        $pageMock->shouldReceive('locations');
        $pageMock->locations();
    }

}

class LocatableTestStub extends Model
{
    use Locatable;
}
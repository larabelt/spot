<?php namespace Tests\Belt\Spot\Unit\Http\Requests;
use Mockery as m;
use Tests\Belt\Core;

use Belt\Spot\Place;
use Belt\Spot\Amenity;
use Belt\Spot\Http\Requests\PaginateAmenitySpots;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class PaginateAmenitySpotsTest extends \Tests\Belt\Core\BeltTestCase
{

    use \Tests\Belt\Core\Base\CommonMocks;

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Http\Requests\PaginateAmenitySpots::modifyQuery
     * @covers \Belt\Spot\Http\Requests\PaginateAmenitySpots::amenities
     * @covers \Belt\Spot\Http\Requests\PaginateAmenitySpots::items
     */
    public function test()
    {
        $place = new Place();
        $place->id = 1;
        $place->name = 'place';

        $amenity1 = new Amenity();
        $amenity1->id = 1;
        $amenity1->name = 'amenity 1';

        $qbMock = m::mock(Builder::class);
        $qbMock->shouldReceive('amenitied')->once()->with('places', 1);
        $qbMock->shouldReceive('notAmenitied')->once()->with('places', 1);
        $qbMock->shouldReceive('get')->once()->andReturn(new Collection([$amenity1]));

        # modifyQuery
        $paginateRequest = new PaginateAmenitySpots(['owner_id' => 1, 'owner_type' => 'places']);
        $paginateRequest->modifyQuery($qbMock);
        $paginateRequest->merge(['not' => true]);
        $paginateRequest->modifyQuery($qbMock);

        # amenities
        $this->assertNull($paginateRequest->amenities);
        $paginateRequest->amenities();
        $this->assertInstanceOf(Amenity::class, $paginateRequest->amenities);

        # items
        $paginateRequest->items($qbMock);
    }

}
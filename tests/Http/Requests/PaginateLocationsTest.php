<?php

use Mockery as m;
use Belt\Core\Testing;

use Belt\Spot\Location;
use Belt\Spot\Http\Requests\PaginateLocations;
use Belt\Core\Pagination\DefaultLengthAwarePaginator;

class PaginateLocationsTest extends Testing\BeltTestCase
{

    use Testing\CommonMocks;

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Http\Requests\PaginateLocations::modifyQuery
     */
    public function test()
    {
        $location1 = new Location();
        $location1->delta = 1;
        $location1->locatable_id = 1;
        $location1->locatable_type = 'pages';

        # modifyQuery
        $qbMock = $this->getPaginateQBMock(new PaginateLocations(), [$location1]);
        $qbMock->shouldReceive('where')->once()->withArgs(['delta', 1]);
        $qbMock->shouldReceive('where')->once()->withArgs(['locatable_id', 1]);
        $qbMock->shouldReceive('where')->once()->withArgs(['locatable_type', 'pages']);

        $paginator = new DefaultLengthAwarePaginator($qbMock, new PaginateLocations([
            'delta' => 1,
            'locatable_id' => 1,
            'locatable_type' => 'pages'
        ]));
        $paginator->build();
    }

}
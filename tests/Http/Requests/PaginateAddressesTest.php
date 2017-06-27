<?php

use Mockery as m;
use Belt\Core\Testing;

use Belt\Spot\Address;
use Belt\Spot\Http\Requests\PaginateAddresses;
use Belt\Core\Pagination\DefaultLengthAwarePaginator;

class PaginateAddressesTest extends Testing\BeltTestCase
{

    use Testing\CommonMocks;

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Http\Requests\PaginateAddresses::modifyQuery
     */
    public function test()
    {
        $address1 = new Address();
        $address1->delta = 1;
        $address1->addressable_id = 1;
        $address1->addressable_type = 'pages';

        # modifyQuery
        $qbMock = $this->getPaginateQBMock(new PaginateAddresses(), [$address1]);
        $qbMock->shouldReceive('where')->once()->withArgs(['delta', 1]);
        $qbMock->shouldReceive('where')->once()->withArgs(['addressable_id', 1]);
        $qbMock->shouldReceive('where')->once()->withArgs(['addressable_type', 'pages']);

        $paginator = new DefaultLengthAwarePaginator($qbMock, new PaginateAddresses([
            'delta' => 1,
            'addressable_id' => 1,
            'addressable_type' => 'pages'
        ]));
        $paginator->build();
    }

}
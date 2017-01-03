<?php

use Mockery as m;
use Ohio\Core\Base\Testing;

use Ohio\Spot\Address\Address;
use Ohio\Spot\Address\Http\Requests\PaginateAddresses;
use Ohio\Core\Base\Pagination\BaseLengthAwarePaginator;

class PaginateAddressesTest extends Testing\OhioTestCase
{

    use Testing\CommonMocks;

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Ohio\Spot\Address\Http\Requests\PaginateAddresses::modifyQuery
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

        new BaseLengthAwarePaginator($qbMock, new PaginateAddresses([
            'delta' => 1,
            'addressable_id' => 1,
            'addressable_type' => 'pages'
        ]));
    }

}
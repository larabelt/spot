<?php

use Mockery as m;
use Ohio\Core\Base\Testing;

use Ohio\Spot\Address\Address;
use Ohio\Spot\Address\Http\Requests\StoreAddress;
use Ohio\Spot\Address\Http\Requests\PaginateAddresses;
use Ohio\Spot\Address\Http\Requests\UpdateAddress;
use Ohio\Spot\Address\Http\Controllers\Api\AddressesController;
use Ohio\Core\Base\Http\Exceptions\ApiNotFoundHttpException;
use Ohio\Spot\Place\Place;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AddressesControllerTest extends Testing\OhioTestCase
{

    use Testing\CommonMocks;

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Ohio\Spot\Address\Http\Controllers\Api\AddressesController::__construct
     * @covers \Ohio\Spot\Address\Http\Controllers\Api\AddressesController::get
     * @covers \Ohio\Spot\Address\Http\Controllers\Api\AddressesController::show
     * @covers \Ohio\Spot\Address\Http\Controllers\Api\AddressesController::destroy
     * @covers \Ohio\Spot\Address\Http\Controllers\Api\AddressesController::update
     * @covers \Ohio\Spot\Address\Http\Controllers\Api\AddressesController::store
     * @covers \Ohio\Spot\Address\Http\Controllers\Api\AddressesController::index
     */
    public function test()
    {
        Place::unguard();
        $place = factory(Place::class)->make();
        $place->id = 1;

        $address1 = factory(Address::class)->make();

        $qbMock = $this->getPaginateQBMock(new PaginateAddresses(), [$address1]);

        $addressRepository = m::mock(Address::class);
        $addressRepository->shouldReceive('find')->with(1)->andReturn($address1);
        $addressRepository->shouldReceive('find')->with(999)->andReturn(null);
        $addressRepository->shouldReceive('create')->andReturn($address1);
        $addressRepository->shouldReceive('query')->andReturn($qbMock);

        # construct
        $controller = new AddressesController($addressRepository);
        $this->assertEquals($addressRepository, $controller->address);

        # get existing address
        $address = $controller->get(1);
        $this->assertEquals($address1->url, $address->url);

        # get address that doesn't exist
        try {
            $controller->get(999);
        } catch (\Exception $e) {
            $this->assertInstanceOf(ApiNotFoundHttpException::class, $e);
        }

        # show address
        $response = $controller->show(1);
        $this->assertInstanceOf(JsonResponse::class, $response);
        $data = $response->getData();
        $this->assertEquals($address1->line1, $data->line1);

        # destroy address
        $response = $controller->destroy(1);
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(204, $response->getStatusCode());

        # update address
        $response = $controller->update(new UpdateAddress(), 1);
        $this->assertInstanceOf(JsonResponse::class, $response);

        # create address
        $response = $controller->store(new StoreAddress([
            'addressable_id' => $place->id,
            'addressable_type' => $place->getMorphClass(),
        ]));
        $this->assertInstanceOf(JsonResponse::class, $response);

        # index
        $response = $controller->index(new PaginateAddresses());
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals($address1->line1, $response->getData()->data[0]->line1);

    }

}
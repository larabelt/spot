<?php

use Mockery as m;
use Ohio\Core\Testing;

use Ohio\Spot\Place;
use Ohio\Spot\Http\Requests\StorePlace;
use Ohio\Spot\Http\Requests\PaginatePlaces;
use Ohio\Spot\Http\Requests\UpdatePlace;
use Ohio\Spot\Http\Controllers\Api\PlacesController;
use Ohio\Core\Http\Exceptions\ApiNotFoundHttpException;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlacesControllerTest extends Testing\OhioTestCase
{

    use Testing\CommonMocks;

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Ohio\Spot\Http\Controllers\Api\PlacesController::__construct
     * @covers \Ohio\Spot\Http\Controllers\Api\PlacesController::get
     * @covers \Ohio\Spot\Http\Controllers\Api\PlacesController::show
     * @covers \Ohio\Spot\Http\Controllers\Api\PlacesController::destroy
     * @covers \Ohio\Spot\Http\Controllers\Api\PlacesController::update
     * @covers \Ohio\Spot\Http\Controllers\Api\PlacesController::store
     * @covers \Ohio\Spot\Http\Controllers\Api\PlacesController::index
     */
    public function test()
    {

        $place1 = factory(Place::class)->make();

        $qbMock = $this->getPaginateQBMock(new PaginatePlaces(), [$place1]);

        $placeRepository = m::mock(Place::class);
        $placeRepository->shouldReceive('find')->with(1)->andReturn($place1);
        $placeRepository->shouldReceive('find')->with(999)->andReturn(null);
        $placeRepository->shouldReceive('create')->andReturn($place1);
        $placeRepository->shouldReceive('query')->andReturn($qbMock);

        # construct
        $controller = new PlacesController($placeRepository);
        $this->assertEquals($placeRepository, $controller->places);

        # get existing place
        $place = $controller->get(1);
        $this->assertEquals($place1->name, $place->name);

        # get place that doesn't exist
        try {
            $controller->get(999);
        } catch (\Exception $e) {
            $this->assertInstanceOf(ApiNotFoundHttpException::class, $e);
        }

        # show place
        $response = $controller->show(1);
        $this->assertInstanceOf(JsonResponse::class, $response);
        $data = $response->getData();
        $this->assertEquals($place1->name, $data->name);

        # destroy place
        $response = $controller->destroy(1);
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(204, $response->getStatusCode());

        # update place
        $response = $controller->update(new UpdatePlace(), 1);
        $this->assertInstanceOf(JsonResponse::class, $response);

        # create place
        $response = $controller->store(new StorePlace(['name' => 'test']));
        $this->assertInstanceOf(JsonResponse::class, $response);

        # index
        $response = $controller->index(new PaginatePlaces());
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals($place1->name, $response->getData()->data[0]->name);

    }

}
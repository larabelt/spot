<?php namespace Tests\Belt\Spot\Feature\Api;

use Belt\Core\Tests;

class ApiAmenitiesTest extends Tests\BeltTestCase
{

    public function test()
    {
        $this->refreshDB();
        $this->actAsSuper();

        # index
        $response = $this->json('GET', '/api/v1/amenities');
        $response->assertStatus(200);

        # store
        $response = $this->json('POST', '/api/v1/amenities', [
            'name' => 'test',
        ]);
        $response->assertStatus(201);
        $response->assertJsonFragment(['name' => 'test']);
        $amenityID = array_get($response->json(), 'id');

        # show
        $response = $this->json('GET', "/api/v1/amenities/$amenityID");
        $response->assertStatus(200);

        # update
        $this->json('PUT', "/api/v1/amenities/$amenityID", ['name' => 'updated']);
        $response = $this->json('GET', "/api/v1/amenities/$amenityID");
        $response->assertJson(['name' => 'updated']);

        # delete
        $response = $this->json('DELETE', "/api/v1/amenities/$amenityID");
        $response->assertStatus(204);
        $response = $this->json('GET', "/api/v1/amenities/$amenityID");
        $response->assertStatus(404);
    }

}
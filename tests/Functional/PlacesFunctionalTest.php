<?php

use Belt\Core\Testing;

class PlacesFunctionalTest extends Testing\BeltTestCase
{

    public function test()
    {
        $this->refreshDB();
        $this->actAsSuper();

        # index
        $response = $this->json('GET', '/api/v1/places');
        $response->assertStatus(200);

        # store
        $response = $this->json('POST', '/api/v1/places', [
            'name' => 'test',
        ]);
        $response->assertStatus(201);
        $placeID = array_get($response->json(), 'id');

        # show
        $response = $this->json('GET', "/api/v1/places/$placeID");
        $response->assertStatus(200);

        # update
        $this->json('PUT', "/api/v1/places/$placeID", ['name' => 'updated']);
        $response = $this->json('GET', "/api/v1/places/$placeID");
        $response->assertJson(['name' => 'updated']);

        # delete
        $response = $this->json('DELETE', "/api/v1/places/$placeID");
        $response->assertStatus(204);
        $response = $this->json('GET', "/api/v1/places/$placeID");
        $response->assertStatus(404);
    }

}
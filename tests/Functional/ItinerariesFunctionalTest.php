<?php

use Belt\Core\Testing;

class ItinerariesFunctionalTest extends Testing\BeltTestCase
{

    public function test()
    {
        $this->refreshDB();
        $this->actAsSuper();

        # index
        $response = $this->json('GET', '/api/v1/itineraries');
        $response->assertStatus(200);

        # store
        $response = $this->json('POST', '/api/v1/itineraries', [
            'name' => 'test',
            'body' => 'test',
        ]);
        $response->assertStatus(201);
        $itineraryID = array_get($response->json(), 'id');

        # show
        $response = $this->json('GET', "/api/v1/itineraries/$itineraryID");
        $response->assertStatus(200);

        # update
        $this->json('PUT', "/api/v1/itineraries/$itineraryID", ['name' => 'updated']);
        $response = $this->json('GET', "/api/v1/itineraries/$itineraryID");
        $response->assertJson(['name' => 'updated']);

        # delete
        $response = $this->json('DELETE', "/api/v1/itineraries/$itineraryID");
        $response->assertStatus(204);
        $response = $this->json('GET', "/api/v1/itineraries/$itineraryID");
        $response->assertStatus(404);
    }

}
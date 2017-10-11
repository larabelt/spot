<?php

use Belt\Core\Testing;

class ApiAmenitySpotsFunctionalTest extends Testing\BeltTestCase
{

    public function test()
    {
        $this->refreshDB();
        $this->actAsSuper();

        # index
        $response = $this->json('GET', '/api/v1/places/1/amenities');
        $response->assertStatus(200);

        # store
        $response = $this->json('POST', '/api/v1/places/1/amenities', [
            'id' => 1,
            'value' => 'foo',
        ]);
        $response->assertStatus(201);
        $response->assertJsonFragment(['id']);
        $response = $this->json('GET', '/api/v1/places/1/amenities/1');
        $response->assertStatus(200);

        # store (again)
        $response = $this->json('POST', '/api/v1/places/1/amenities', [
            'id' => 1,
            'value' => 'bar',
        ]);
        $response->assertStatus(201);

        # update
        $this->json('PUT', '/api/v1/places/1/amenities/1', ['value' => 'updated']);

        # show
        $response = $this->json('GET', "/api/v1/places/1/amenities/1");
        $response->assertStatus(200);
        $response->assertJson(['pivot' => ['value' => 'updated']]);

        # detach
        $response = $this->json('DELETE', "/api/v1/places/1/amenities/1");
        $response->assertStatus(204);
        $response = $this->json('GET', "/api/v1/places/1/amenities/1");
        $response->assertStatus(404);
    }

}
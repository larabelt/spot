<?php

use Belt\Core\Testing;
use Belt\Spot\Services\GeoCoders;

class ApiLocationsFunctionalTest extends Testing\BeltTestCase
{

    public function test()
    {
        $this->refreshDB();
        $this->actAsSuper();

        app()['config']->set('belt.spot.geocoders', [
            'default_driver' => 'mock',
            'drivers' => [
                'mock' => [
                    'adapter' => GeoCoders\MockGeoCoder::class
                ]
            ]
        ]);

        # index
        $response = $this->json('GET', '/api/v1/places/1/locations');
        $response->assertStatus(200);

        # store
        $response = $this->json('POST', '/api/v1/places/1/locations', [
            'locatable_id' => 1,
            'locatable_type' => 'places',
            'name' => 'test',
        ]);
        $response->assertStatus(201);
        $response->assertJsonFragment(['name' => 'TEST']);
        $locationID = array_get($response->json(), 'id');

        # store (with _location)
        $response = $this->json('POST', '/api/v1/places/1/locations', [
            'locatable_id' => 1,
            'locatable_type' => 'places',
            '_location' => '123 some st',
        ]);
        $response->assertStatus(201);
        $response->assertJsonFragment(['locatable_type' => 'places']);
        $response->assertJsonFragment(['locatable_id' => '1']);

        # show
        $response = $this->json('GET', "/api/v1/places/1/locations/$locationID");
        $response->assertStatus(200);

        # show (invalid)
        $response = $this->json('GET', "/api/v1/places/2/locations/$locationID");
        $response->assertStatus(404);

        # update
        $this->json('PUT', "/api/v1/places/1/locations/$locationID", [
            'name' => 'updated',
            '_geocode' => 'lat,lng',
        ]);
        $response = $this->json('GET', "/api/v1/places/1/locations/$locationID");
        $response->assertJson(['name' => 'UPDATED']);
        $response->assertJson(['lat' => 1.23]);

        # delete
        $response = $this->json('DELETE', "/api/v1/places/1/locations/$locationID");
        $response->assertStatus(204);
        $response = $this->json('GET', "/api/v1/places/1/locations/$locationID");
        $response->assertStatus(404);
    }

}
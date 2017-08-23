<?php

use Belt\Core\Testing;
use Belt\Spot\Services\GeoCoders;

class ApiAddressesFunctionalTest extends Testing\BeltTestCase
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
        $response = $this->json('GET', '/api/v1/places/1/addresses');
        $response->assertStatus(200);

        # store
        $response = $this->json('POST', '/api/v1/places/1/addresses', [
            'addressable_id' => 1,
            'addressable_type' => 'places',
            'name' => 'test',
        ]);
        $response->assertStatus(201);
        $response->assertJsonFragment(['id']);
        $addressID = array_get($response->json(), 'id');

        # store (with _address)
        $response = $this->json('POST', '/api/v1/places/1/addresses', [
            'addressable_id' => 1,
            'addressable_type' => 'places',
            '_address' => '123 some st',
        ]);
        $response->assertStatus(201);
        $response->assertJsonFragment(['id']);

        # show
        $response = $this->json('GET', "/api/v1/places/1/addresses/$addressID");
        $response->assertStatus(200);

        # show (invalid)
        $response = $this->json('GET', "/api/v1/places/2/addresses/$addressID");
        $response->assertStatus(404);

        # update
        $this->json('PUT', "/api/v1/places/1/addresses/$addressID", [
            'name' => 'updated',
            '_geocode' => 'lat,lng',
        ]);
        $response = $this->json('GET', "/api/v1/places/1/addresses/$addressID");
        $response->assertJson(['name' => 'UPDATED']);
        $response->assertJson(['lat' => 1.23]);

        # delete
        $response = $this->json('DELETE', "/api/v1/places/1/addresses/$addressID");
        $response->assertStatus(204);
        $response = $this->json('GET', "/api/v1/places/1/addresses/$addressID");
        $response->assertStatus(404);
    }

}
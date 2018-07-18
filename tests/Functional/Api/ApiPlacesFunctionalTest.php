<?php

use Belt\Core\Testing;
use Belt\Spot\Amenity;
use Belt\Spot\Place;

class ApiPlacesFunctionalTest extends Testing\BeltTestCase
{

    public function test()
    {
        $this->refreshDB();
        $this->actAsSuper();

        app()['config']->set('belt.templates.places.default.builder', null);

        # index
        $response = $this->json('GET', '/api/v1/places');
        $response->assertStatus(200);

        # store
        $response = $this->json('POST', '/api/v1/places', [
            'name' => 'test',
            'template' => 'foo',
        ]);

        $response->assertStatus(201);
        $response->assertJsonFragment(['name' => 'test']);
        $placeID = array_get($response->json(), 'id');

        # show
        $response = $this->json('GET', "/api/v1/places/$placeID");
        $response->assertStatus(200);

        # update
        $this->json('PUT', "/api/v1/places/$placeID", ['name' => 'updated']);
        $response = $this->json('GET', "/api/v1/places/$placeID");
        $response->assertJson(['name' => 'updated']);

        # copy
        Place::unguard();
        $old = Place::find($placeID);
        $old->handles()->create(['url' => '/copied-place']);
        $this->json('POST', "/api/v1/places/$placeID/locations", ['name' => 'test']);
        $this->json('POST', "/api/v1/places/$placeID/amenities", ['id' => 1]);
        $this->json('POST', "/api/v1/places/$placeID/terms", ['id' => 1]);
        $this->json('POST', "/api/v1/places/$placeID/categories", ['id' => 1]);
        $this->json('POST', "/api/v1/places/$placeID/handles", ['url' => "places/$placeID"]);
        $this->json('POST', "/api/v1/places/$placeID/sections", [
            'template' => 'containers.default',
        ]);
        $this->json('POST', "/api/v1/places/$placeID/tags", ['id' => 1]);
        $response = $this->json('POST', "/api/v1/places", ['source' => $placeID]);
        $newID = array_get($response->json(), 'id');
        $response = $this->json('GET', "/api/v1/places/$newID");
        $response->assertStatus(200);

        # delete
        $response = $this->json('DELETE', "/api/v1/places/$placeID");
        $response->assertStatus(204);
        $response = $this->json('GET', "/api/v1/places/$placeID");
        $response->assertStatus(404);
    }

}
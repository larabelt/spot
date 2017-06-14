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
        $response->assertJsonFragment(['id']);
        $placeID = array_get($response->json(), 'id');

        # show
        $response = $this->json('GET', "/api/v1/places/$placeID");
        $response->assertStatus(200);

        # update
        $this->json('PUT', "/api/v1/places/$placeID", ['name' => 'updated']);
        $response = $this->json('GET', "/api/v1/places/$placeID");
        $response->assertJson(['name' => 'updated']);

        # copy
        $this->json('POST', "/api/v1/places/$placeID/addresses", ['name' => 'test']);
        $this->json('POST', "/api/v1/places/$placeID/attachments", ['id' => 1]);
        $this->json('POST', "/api/v1/places/$placeID/categories", ['id' => 1]);
        $this->json('POST', "/api/v1/places/$placeID/handles", ['url' => "places/$placeID"]);
        $this->json('POST', "/api/v1/places/$placeID/sections", [
            'sectionable_type' => 'sections',
            'heading' => 'place',
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
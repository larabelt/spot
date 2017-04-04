<?php

use Belt\Core\Testing;

class AddressesFunctionalTest extends Testing\BeltTestCase
{

    public function test()
    {
        $this->refreshDB();
        $this->actAsSuper();

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

        # show
        $response = $this->json('GET', "/api/v1/places/1/addresses/$addressID");
        $response->assertStatus(200);

        # update
        $this->json('PUT', "/api/v1/places/1/addresses/$addressID", [
            'name' => 'updated'
        ]);
        $response = $this->json('GET', "/api/v1/places/1/addresses/$addressID");
        $response->assertJson(['name' => 'UPDATED']);

        # delete
        $response = $this->json('DELETE', "/api/v1/places/1/addresses/$addressID");
        $response->assertStatus(204);
        $response = $this->json('GET', "/api/v1/places/1/addresses/$addressID");
        $response->assertStatus(404);
    }

}
<?php

use Belt\Core\Testing;

class EventsFunctionalTest extends Testing\BeltTestCase
{

    public function test()
    {
        $this->refreshDB();
        $this->actAsSuper();

        # index
        $response = $this->json('GET', '/api/v1/events');
        $response->assertStatus(200);

        # store
        $response = $this->json('POST', '/api/v1/events', [
            'name' => 'test',
        ]);
        $response->assertStatus(201);
        $response->assertJsonFragment(['id']);
        $eventID = array_get($response->json(), 'id');

        # show
        $response = $this->json('GET', "/api/v1/events/$eventID");
        $response->assertStatus(200);

        # update
        $this->json('PUT', "/api/v1/events/$eventID", ['name' => 'updated']);
        $response = $this->json('GET', "/api/v1/events/$eventID");
        $response->assertJson(['name' => 'updated']);

        # delete
        $response = $this->json('DELETE', "/api/v1/events/$eventID");
        $response->assertStatus(204);
        $response = $this->json('GET', "/api/v1/events/$eventID");
        $response->assertStatus(404);
    }

}
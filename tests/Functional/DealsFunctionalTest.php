<?php

use Belt\Core\Testing;

class DealsFunctionalTest extends Testing\BeltTestCase
{

    public function test()
    {
        $this->refreshDB();
        $this->actAsSuper();

        # index
        $response = $this->json('GET', '/api/v1/deals');
        $response->assertStatus(200);

        # store
        $response = $this->json('POST', '/api/v1/deals', [
            'name' => 'test',
        ]);
        $response->assertStatus(201);
        $response->assertJsonFragment(['id']);
        $dealID = array_get($response->json(), 'id');

        # show
        $response = $this->json('GET', "/api/v1/deals/$dealID");
        $response->assertStatus(200);

        # update
        $this->json('PUT', "/api/v1/deals/$dealID", ['name' => 'updated']);
        $response = $this->json('GET', "/api/v1/deals/$dealID");
        $response->assertJson(['name' => 'updated']);

        # delete
        $response = $this->json('DELETE', "/api/v1/deals/$dealID");
        $response->assertStatus(204);
        $response = $this->json('GET', "/api/v1/deals/$dealID");
        $response->assertStatus(404);
    }

}
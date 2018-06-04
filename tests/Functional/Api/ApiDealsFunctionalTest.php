<?php

use Belt\Core\Testing;

class ApiDealsFunctionalTest extends Testing\BeltTestCase
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

        # copy
        $this->json('POST', "/api/v1/deals/$dealID/addresses", ['name' => 'test']);
        $this->json('POST', "/api/v1/deals/$dealID/attachments", ['id' => 1]);
        $this->json('POST', "/api/v1/deals/$dealID/terms", ['id' => 1]);
        $this->json('POST', "/api/v1/deals/$dealID/handles", ['url' => "deals/$dealID"]);
        $this->json('POST', "/api/v1/deals/$dealID/sections", [
            'template' => 'containers.default',
        ]);
        $this->json('POST', "/api/v1/deals/$dealID/tags", ['id' => 1]);
        $response = $this->json('POST', "/api/v1/deals", ['source' => $dealID]);
        $newID = array_get($response->json(), 'id');
        $response = $this->json('GET', "/api/v1/deals/$newID");
        $response->assertStatus(200);

        # delete
        $response = $this->json('DELETE', "/api/v1/deals/$dealID");
        $response->assertStatus(204);
        $response = $this->json('GET', "/api/v1/deals/$dealID");
        $response->assertStatus(404);
    }

}
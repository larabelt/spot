<?php

use Belt\Core\Testing;
use Belt\Spot\Event;

class ApiEventsFunctionalTest extends Testing\BeltTestCase
{

    public function test()
    {
        $this->refreshDB();
        $this->actAsSuper();

        app()['config']->set('belt.templates.events.default.builder', null);

        # index
        $response = $this->json('GET', '/api/v1/events');
        $response->assertStatus(200);

        # store
        $response = $this->json('POST', '/api/v1/events', [
            'name' => 'test',
            'starts_at' => date('Y-m-d H:i:s', strtotime('+1 week')),
            'ends_at' => date('Y-m-d H:i:s', strtotime('+2 week')),
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

        # copy
        Event::unguard();
        $old = Event::find($eventID);
        $old->handles()->create(['url' => '/copied-event']);
        $old->terms()->attach(1);
        $this->json('POST', "/api/v1/events/$eventID/addresses", ['name' => 'test']);
        $this->json('POST', "/api/v1/events/$eventID/attachments", ['id' => 1]);
        $this->json('POST', "/api/v1/events/$eventID/categories", ['id' => 1]);
        $this->json('POST', "/api/v1/events/$eventID/handles", ['url' => "events/$eventID"]);
        $this->json('POST', "/api/v1/events/$eventID/sections", [
            'template' => 'containers.default',
        ]);
        $this->json('POST', "/api/v1/events/$eventID/tags", ['id' => 1]);

        $response = $this->json('POST', "/api/v1/events", ['source' => $eventID]);
        $newID = array_get($response->json(), 'id');
        $response = $this->json('GET', "/api/v1/events/$newID");
        $response->assertStatus(200);

        # delete
        $response = $this->json('DELETE', "/api/v1/events/$eventID");
        $response->assertStatus(204);
        $response = $this->json('GET', "/api/v1/events/$eventID");
        $response->assertStatus(404);
    }

}
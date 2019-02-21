<?php namespace Tests\Belt\Spot\Feature\Api;

use Belt\Core\Tests;
use Belt\Spot\Event;

class ApiEventsTest extends Tests\BeltTestCase
{

    public function test()
    {
        $this->refreshDB();
        $this->actAsSuper();

        app()['config']->set('belt.subtypes.events.default.builder', null);

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
        $response->assertJsonFragment(['name' => 'test']);
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
        $this->json('POST', "/api/v1/events/$eventID/locations", ['name' => 'test']);
        $this->json('POST', "/api/v1/events/$eventID/attachments", ['id' => 1]);
        $this->json('POST', "/api/v1/events/$eventID/categories", ['id' => 1]);
        $this->json('POST', "/api/v1/events/$eventID/handles", ['url' => "events/$eventID"]);
        $this->json('POST', "/api/v1/events/$eventID/sections", [
            'subtype' => 'containers.default',
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
<?php

use Belt\Core\Testing;
use Belt\Spot\Event;

class WebEventsFunctionalTest extends Testing\BeltTestCase
{

    public function testAsSuper()
    {
        $this->refreshDB();

        Event::unguard();
        $event = Event::find(1);

        # show
        $event->update(['is_active' => true]);
        $response = $this->json('GET', '/events/1');
        $response->assertStatus(200);

        # show (404)
        $event->update(['is_active' => false]);
        $response = $this->json('GET', '/events/1');
        $response->assertStatus(404);

        # show (super, avoid 404)
        $this->actAsSuper();
        $response = $this->json('GET', '/events/1');
        $response->assertStatus(200);
    }

}
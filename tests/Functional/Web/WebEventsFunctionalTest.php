<?php

use Belt\Core\Testing;
use Belt\Spot\Event;

class WebEventsFunctionalTest extends Testing\BeltTestCase
{

    public function testAsSuper()
    {
        $this->refreshDB();
        $this->actAsSuper();

        Event::unguard();
        $event = Event::find(1);
        $event->update(['is_active' => true]);

        # show
        $response = $this->json('GET', '/events/1');
        $response->assertStatus(200);

        $event->update(['is_active' => false]);

        # show (404)
        $response = $this->json('GET', '/events/1');
        $response->assertStatus(404);
    }

}
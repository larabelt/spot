<?php namespace Tests\Belt\Spot\Feature\Web;

use Tests\Belt\Core;
use Belt\Spot\Event;

class WebEventsTest extends \Tests\Belt\Core\BeltTestCase
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
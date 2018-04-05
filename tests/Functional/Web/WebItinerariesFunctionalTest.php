<?php

use Belt\Core\Testing;
use Belt\Spot\Itinerary;

class WebItinerariesFunctionalTest extends Testing\BeltTestCase
{

    public function testAsSuper()
    {
        $this->refreshDB();
        $this->actAsSuper();

        Itinerary::unguard();
        $itinerary = Itinerary::find(1);
        $itinerary->update(['is_active' => true]);

        # show
        $response = $this->json('GET', '/itineraries/1');
        $response->assertStatus(200);

        $itinerary->update(['is_active' => false]);

        # show (404)
        $response = $this->json('GET', '/itineraries/1');
        $response->assertStatus(404);
    }

}
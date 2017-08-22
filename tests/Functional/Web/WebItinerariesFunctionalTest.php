<?php

use Belt\Core\Testing;

class WebItinerariesFunctionalTest extends Testing\BeltTestCase
{

    public function testAsSuper()
    {
        $this->refreshDB();
        $this->actAsSuper();

        # show
        $response = $this->json('GET', '/itineraries/1');
        $response->assertStatus(200);
    }

}
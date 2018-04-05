<?php

use Belt\Core\Testing;
use Belt\Spot\Place;

class WebPlacesFunctionalTest extends Testing\BeltTestCase
{

    public function testAsSuper()
    {
        $this->refreshDB();
        $this->actAsSuper();

        Place::unguard();
        $place = Place::find(1);
        $place->update(['is_active' => true]);

        # show
        $response = $this->json('GET', '/places/1');
        $response->assertStatus(200);

        $place->update(['is_active' => false]);

        # show (404)
        $response = $this->json('GET', '/places/1');
        $response->assertStatus(404);
    }

}
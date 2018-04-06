<?php

use Belt\Core\Testing;
use Belt\Spot\Place;

class WebPlacesFunctionalTest extends Testing\BeltTestCase
{

    public function testAsSuper()
    {
        $this->refreshDB();

        Place::unguard();
        $place = Place::find(1);

        # show
        $place->update(['is_active' => true]);
        $response = $this->json('GET', '/places/1');
        $response->assertStatus(200);

        # show (404)
        $place->update(['is_active' => false]);
        $response = $this->json('GET', '/places/1');
        $response->assertStatus(404);

        # show (super, avoid 404)
        $this->actAsSuper();
        $response = $this->json('GET', '/places/1');
        $response->assertStatus(200);
    }

}
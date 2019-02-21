<?php namespace Tests\Belt\Spot\Feature\Web;

use Belt\Core\Tests;
use Belt\Spot\Place;

class WebPlacesTest extends Tests\BeltTestCase
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
<?php

use Belt\Core\Testing;

class WebPlacesFunctionalTest extends Testing\BeltTestCase
{

    public function testAsSuper()
    {
        $this->refreshDB();
        $this->actAsSuper();

        # show
        $response = $this->json('GET', '/places/1');
        $response->assertStatus(200);
    }

}
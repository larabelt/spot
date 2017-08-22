<?php

use Belt\Core\Testing;

class WebEventsFunctionalTest extends Testing\BeltTestCase
{

    public function testAsSuper()
    {
        $this->refreshDB();
        $this->actAsSuper();

        # show
        $response = $this->json('GET', '/events/1');
        $response->assertStatus(200);
    }

}
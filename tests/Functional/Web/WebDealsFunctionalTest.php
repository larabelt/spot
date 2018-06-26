<?php

use Belt\Core\Testing;
use Belt\Spot\Deal;

class WebDealsFunctionalTest extends Testing\BeltTestCase
{

    public function testAsSuper()
    {
        $this->refreshDB();

        Deal::unguard();
        $deal = Deal::find(1);

        # show
        $deal->update(['is_active' => true]);
        $response = $this->json('GET', '/deals/1');
        $response->assertStatus(200);

        # show (404)
        $deal->update(['is_active' => false]);
        $response = $this->json('GET', '/deals/1');
        $response->assertStatus(404);

        # show (super, avoid 404)
        $this->actAsSuper();
        $response = $this->json('GET', '/deals/1');
        $response->assertStatus(200);
    }

}
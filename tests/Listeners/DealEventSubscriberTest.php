<?php

use Mockery as m;
use Belt\Core\Testing;
use Belt\Spot\Events;
use Belt\Spot\Listeners;
use Illuminate\Events\Dispatcher;

class DealEventSubscriberTest extends Testing\BeltTestCase
{

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Listeners\DealEventSubscriber::subscribe
     */
    public function test()
    {
        //app()['config']->set('belt.spot.deals.send_welcome_email', true);

//        $events = m::mock(Dispatcher::class);
//        $events->shouldReceive('listen')
//            ->with(Events\DealCreated::class, Listeners\SendDealWelcomeEmail::class)
//            ->once()
//            ->andReturnSelf();
//
//        $subscriber = new Listeners\DealEventSubscriber();
//        $subscriber->subscribe($events);
    }

}
<?php

use Mockery as m;
use Belt\Core\Testing;
use Belt\Spot\Events;
use Belt\Spot\Listeners;
use Illuminate\Events\Dispatcher;

class PlaceEventSubscriberTest extends Testing\BeltTestCase
{

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Listeners\PlaceEventSubscriber::subscribe
     */
    public function test()
    {
        //app()['config']->set('belt.spot.places.send_welcome_email', true);

//        $events = m::mock(Dispatcher::class);
//        $events->shouldReceive('listen')
//            ->with(Events\PlaceCreated::class, Listeners\SendPlaceWelcomeEmail::class)
//            ->once()
//            ->andReturnSelf();
//
//        $subscriber = new Listeners\PlaceEventSubscriber();
//        $subscriber->subscribe($events);
    }

}
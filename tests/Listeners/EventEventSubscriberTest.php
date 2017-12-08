<?php

use Mockery as m;
use Belt\Core\Testing;
use Belt\Spot\Events;
use Belt\Spot\Listeners;
use Illuminate\Events\Dispatcher;

class EventEventSubscriberTest extends Testing\BeltTestCase
{

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Listeners\EventEventSubscriber::subscribe
     */
    public function test()
    {
        //app()['config']->set('belt.spot.events.send_welcome_email', true);

//        $events = m::mock(Dispatcher::class);
//        $events->shouldReceive('listen')
//            ->with(Events\EventCreated::class, Listeners\SendEventWelcomeEmail::class)
//            ->once()
//            ->andReturnSelf();
//
//        $subscriber = new Listeners\EventEventSubscriber();
//        $subscriber->subscribe($events);
    }

}
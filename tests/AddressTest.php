<?php

use Belt\Core\Testing\BeltTestCase;
use Belt\Spot\Place;
use Belt\Spot\Address;

class AddressTest extends BeltTestCase
{
    /**
     * @covers \Belt\Spot\Address::__toString
     * @covers \Belt\Spot\Address::addressable
     * @covers \Belt\Spot\Address::setGeoServiceAttribute
     * @covers \Belt\Spot\Address::setGeoCodeAttribute
     */
    public function test()
    {

        Place::unguard();
        $place = factory(Place::class)->make();
        $place->id = 1;

        Address::unguard();
        $address = factory(Address::class)->make();
        $address->id = 2;
        $address->addressable_id = 1;
        $address->addressable_type = $place->getMorphClass();
        $address->geo_service = ' test ';
        $address->geo_code = ' test ';
        $address->delta = 1;
        $address->addressable()->add($place);

        $attributes = $address->getAttributes();

        # setters
        $this->assertEquals(2, $address->__toString());
        $this->assertEquals('test', $attributes['geo_service']);
        $this->assertEquals('test', $attributes['geo_code']);
        $this->assertEquals('places', $attributes['addressable_type']);
    }

}
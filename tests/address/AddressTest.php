<?php

use Ohio\Core\Base\Testing\OhioTestCase;
use Ohio\Spot\Page\Page;
use Ohio\Spot\Address\Address;

class AddressTest extends OhioTestCase
{
    /**
     * @covers \Ohio\Spot\Address\Address::__toString
     * @covers \Ohio\Spot\Address\Address::setUrlAttribute
     * @covers \Ohio\Spot\Address\Address::addressable
     * @covers \Ohio\Spot\Address\Address::normalizeUrl
     */
    public function test()
    {

        # normalizeUrl
        $this->assertEquals('one', Address::normalizeUrl('One'));
        $this->assertEquals('one/123/what-just-happened', Address::normalizeUrl("One/123!!!/What Just Happened?"));

        Page::unguard();
        $page = factory(Page::class)->make();
        $page->id = 1;

        Address::unguard();
        $address = factory(Address::class)->make();
        $address->addressable_id = 1;
        $address->addressable_type = $page->getMorphClass();
        $address->url = ' /Test/test it all ';
        $address->delta = 1;
        $address->addressable()->add($page);

        $attributes = $address->getAttributes();

        # addressable relationship
        //$this->assertInstanceOf(Page::class, $address->addressable);

        # setters
        $this->assertEquals('test/test-it-all', $address->__toString());
        $this->assertEquals('test/test-it-all', $attributes['url']);
        $this->assertEquals('pages', $attributes['addressable_type']);
    }

}
<?php

use Illuminate\Database\Eloquent\Model;
use Ohio\Spot\Behaviors\AddressTrait;

class AddressTraitTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers \Ohio\Spot\Behaviors\AddressTrait::full
     * @covers \Ohio\Spot\Behaviors\AddressTrait::getFullAttribute
     * @covers \Ohio\Spot\Behaviors\AddressTrait::setNameAttribute
     * @covers \Ohio\Spot\Behaviors\AddressTrait::setNicknameAttribute
     * @covers \Ohio\Spot\Behaviors\AddressTrait::setLine1Attribute
     * @covers \Ohio\Spot\Behaviors\AddressTrait::setLine2Attribute
     * @covers \Ohio\Spot\Behaviors\AddressTrait::setLine3Attribute
     * @covers \Ohio\Spot\Behaviors\AddressTrait::setLine4Attribute
     * @covers \Ohio\Spot\Behaviors\AddressTrait::setLocalityAttribute
     * @covers \Ohio\Spot\Behaviors\AddressTrait::setSubLocalityAttribute
     * @covers \Ohio\Spot\Behaviors\AddressTrait::setRegionAttribute
     * @covers \Ohio\Spot\Behaviors\AddressTrait::setPostcodeAttribute
     * @covers \Ohio\Spot\Behaviors\AddressTrait::setCountryAttribute
     * @covers \Ohio\Spot\Behaviors\AddressTrait::setOriginalAttribute
     * @covers \Ohio\Spot\Behaviors\AddressTrait::setFormattedAttribute
     */
    public function test()
    {
        $addressStub = new AddressTraitTestStub();

        # name
        $addressStub->setNameAttribute(' Test ');
        $this->assertEquals('TEST', $addressStub->name);

        # nickname
        $addressStub->setNicknameAttribute(' Test ');
        $this->assertEquals('TEST', $addressStub->nickname);

        # line1
        $addressStub->setLine1Attribute(' Test ');
        $this->assertEquals('TEST', $addressStub->line1);

        # line2
        $addressStub->setLine2Attribute(' Test ');
        $this->assertEquals('TEST', $addressStub->line2);

        # line3
        $addressStub->setLine3Attribute(' Test ');
        $this->assertEquals('TEST', $addressStub->line3);

        # line4
        $addressStub->setLine4Attribute(' Test ');
        $this->assertEquals('TEST', $addressStub->line4);

        # locality
        $addressStub->setLocalityAttribute(' Test ');
        $this->assertEquals('TEST', $addressStub->locality);

        # sub_locality
        $addressStub->setSubLocalityAttribute(' Test ');
        $this->assertEquals('TEST', $addressStub->sub_locality);

        # region
        $addressStub->setRegionAttribute(' Test ');
        $this->assertEquals('TEST', $addressStub->region);

        # postcode
        $addressStub->setPostcodeAttribute(' Test ');
        $this->assertEquals('TEST', $addressStub->postcode);

        # country
        $addressStub->setCountryAttribute(' Test ');
        $this->assertEquals('TE', $addressStub->country);

        # original
        $addressStub->setOriginalAttribute(' Test ');
        $this->assertEquals('TEST', $addressStub->original);

        # formatted
        $addressStub->setFormattedAttribute(' Test ');
        $this->assertEquals('TEST', $addressStub->formatted);

        # full
        $this->assertEquals($addressStub->getFullAttribute(), $addressStub->full());
        $this->assertEquals('TEST, TEST, TEST, TEST, TEST, TEST, TEST TEST, TEST, TE', $addressStub->full());
    }

}

class AddressTraitTestStub extends Model
{
    use AddressTrait;
}
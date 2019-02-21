<?php namespace Tests\Belt\Spot\Unit\Behaviors;

use Illuminate\Database\Eloquent\Model;
use Belt\Spot\Behaviors\IncludesLocation;

class IncludesLocationTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @covers \Belt\Spot\Behaviors\IncludesLocation::full
     * @covers \Belt\Spot\Behaviors\IncludesLocation::getFullAttribute
     * @covers \Belt\Spot\Behaviors\IncludesLocation::setNameAttribute
     * @covers \Belt\Spot\Behaviors\IncludesLocation::setNicknameAttribute
     * @covers \Belt\Spot\Behaviors\IncludesLocation::setLine1Attribute
     * @covers \Belt\Spot\Behaviors\IncludesLocation::setLine2Attribute
     * @covers \Belt\Spot\Behaviors\IncludesLocation::setLine3Attribute
     * @covers \Belt\Spot\Behaviors\IncludesLocation::setLine4Attribute
     * @covers \Belt\Spot\Behaviors\IncludesLocation::setLocalityAttribute
     * @covers \Belt\Spot\Behaviors\IncludesLocation::setSubLocalityAttribute
     * @covers \Belt\Spot\Behaviors\IncludesLocation::setRegionAttribute
     * @covers \Belt\Spot\Behaviors\IncludesLocation::setPostcodeAttribute
     * @covers \Belt\Spot\Behaviors\IncludesLocation::setCountryAttribute
     * @covers \Belt\Spot\Behaviors\IncludesLocation::setOriginalAttribute
     * @covers \Belt\Spot\Behaviors\IncludesLocation::setFormattedAttribute
     */
    public function test()
    {
        $locationStub = new IncludesLocationTestStub();

        # name
        $locationStub->setNameAttribute(' Test ');
        $this->assertEquals('TEST', $locationStub->name);

        # nickname
        $locationStub->setNicknameAttribute(' Test ');
        $this->assertEquals('TEST', $locationStub->nickname);

        # line1
        $locationStub->setLine1Attribute(' Test ');
        $this->assertEquals('TEST', $locationStub->line1);

        # line2
        $locationStub->setLine2Attribute(' Test ');
        $this->assertEquals('TEST', $locationStub->line2);

        # line3
        $locationStub->setLine3Attribute(' Test ');
        $this->assertEquals('TEST', $locationStub->line3);

        # line4
        $locationStub->setLine4Attribute(' Test ');
        $this->assertEquals('TEST', $locationStub->line4);

        # locality
        $locationStub->setLocalityAttribute(' Test ');
        $this->assertEquals('TEST', $locationStub->locality);

        # sub_locality
        $locationStub->setSubLocalityAttribute(' Test ');
        $this->assertEquals('TEST', $locationStub->sub_locality);

        # region
        $locationStub->setRegionAttribute(' Test ');
        $this->assertEquals('TEST', $locationStub->region);

        # postcode
        $locationStub->setPostcodeAttribute(' Test ');
        $this->assertEquals('TEST', $locationStub->postcode);

        # country
        $locationStub->setCountryAttribute(' Test ');
        $this->assertEquals('TE', $locationStub->country);

        # original
        $locationStub->setOriginalAttribute(' Test ');
        $this->assertEquals('TEST', $locationStub->original);

        # formatted
        $locationStub->setFormattedAttribute(' Test ');
        $this->assertEquals('TEST', $locationStub->formatted);

        # full
        $this->assertEquals($locationStub->getFullAttribute(), $locationStub->full());
        $this->assertEquals('TEST, TEST, TEST, TEST, TEST, TEST, TEST TEST, TEST, TE', $locationStub->full());
    }

}

class IncludesLocationTestStub extends Model
{
    use IncludesLocation;
}
<?php

use Illuminate\Database\Eloquent\Model;
use Ohio\Spot\Behaviors\LatLngTrait;

class LatLngTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Ohio\Spot\Behaviors\LatLngTrait::setLatAttribute
     * @covers \Ohio\Spot\Behaviors\LatLngTrait::setNorthLatAttribute
     * @covers \Ohio\Spot\Behaviors\LatLngTrait::setSouthLatAttribute
     * @covers \Ohio\Spot\Behaviors\LatLngTrait::setLngAttribute
     * @covers \Ohio\Spot\Behaviors\LatLngTrait::setEastLngAttribute
     * @covers \Ohio\Spot\Behaviors\LatLngTrait::setWestLngAttribute
     */
    public function test()
    {
        $latLngStub = new LatLngTraitTestStub();

        # lat
        $latLngStub->setLatAttribute(1);
        $this->assertEquals(1, $latLngStub->lat);

        # north lat
        $latLngStub->setNorthLatAttribute(1);
        $this->assertEquals(1, $latLngStub->north_lat);

        # south lat
        $latLngStub->setSouthLatAttribute(1);
        $this->assertEquals(1, $latLngStub->south_lat);

        # lng
        $latLngStub->setLngAttribute(1);
        $this->assertEquals(1, $latLngStub->lng);

        # east lng
        $latLngStub->setEastLngAttribute(1);
        $this->assertEquals(1, $latLngStub->east_lng);

        # west lng
        $latLngStub->setWestLngAttribute(1);
        $this->assertEquals(1, $latLngStub->west_lng);
    }

}

class LatLngTraitTestStub extends Model
{
    use LatLngTrait;
}
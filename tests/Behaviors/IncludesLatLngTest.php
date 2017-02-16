<?php

use Illuminate\Database\Eloquent\Model;
use Belt\Spot\Behaviors\IncludesLatLng;

class IncludesLatLngTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Belt\Spot\Behaviors\IncludesLatLng::setLatAttribute
     * @covers \Belt\Spot\Behaviors\IncludesLatLng::setNorthLatAttribute
     * @covers \Belt\Spot\Behaviors\IncludesLatLng::setSouthLatAttribute
     * @covers \Belt\Spot\Behaviors\IncludesLatLng::setLngAttribute
     * @covers \Belt\Spot\Behaviors\IncludesLatLng::setEastLngAttribute
     * @covers \Belt\Spot\Behaviors\IncludesLatLng::setWestLngAttribute
     */
    public function test()
    {
        $latLngStub = new IncludesLatLngTestStub();

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

class IncludesLatLngTestStub extends Model
{
    use IncludesLatLng;
}
<?php

use Illuminate\Database\Eloquent\Model;
use Ohio\Spot\Behaviors\IncludesLatLng;

class IncludesLatLngTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Ohio\Spot\Behaviors\IncludesLatLng::setLatAttribute
     * @covers \Ohio\Spot\Behaviors\IncludesLatLng::setNorthLatAttribute
     * @covers \Ohio\Spot\Behaviors\IncludesLatLng::setSouthLatAttribute
     * @covers \Ohio\Spot\Behaviors\IncludesLatLng::setLngAttribute
     * @covers \Ohio\Spot\Behaviors\IncludesLatLng::setEastLngAttribute
     * @covers \Ohio\Spot\Behaviors\IncludesLatLng::setWestLngAttribute
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
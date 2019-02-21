<?php namespace Tests\Belt\Spot\Unit\Behaviors;

use Belt\Core\Tests\BeltTestCase;
use Belt\Spot\Behaviors\HasGeoCoder;
use Belt\Spot\Services\GeoCoders;
use Illuminate\Database\Eloquent\Model;

class HasGeoCoderTest extends BeltTestCase
{

    /**
     * @covers \Belt\Spot\Behaviors\HasGeoCoder::geocoder
     * @covers \Belt\Spot\Behaviors\HasGeoCoder::geocode
     */
    public function test()
    {

        $hasGeoCoder = new HasGeoCoderTestStub();

        # geocoder
        $this->assertInstanceOf(GeoCoders\BaseGeoCoder::class, $hasGeoCoder->geocoder());

        # geocode
        $geocoder = new GeoCoders\MockGeoCoder();
        $hasGeoCoder->geocoder = $geocoder;
        $hasGeoCoder->geocode('test');
        $result = $hasGeoCoder->geocoder()->result();
        $this->assertEquals('test', array_get($result, 'input'));
    }

}

class HasGeoCoderTestStub extends Model
{
    use HasGeoCoder;

    public function getMorphClass()
    {
        return 'hasGeoCoderTestStub';
    }
}
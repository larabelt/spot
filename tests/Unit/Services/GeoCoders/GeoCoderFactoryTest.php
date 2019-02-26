<?php namespace Tests\Belt\Spot\Unit\Services\GeoCoders;

use Mockery as m;
use Tests\Belt\Core\BeltTestCase;
use Belt\Spot\Services\GeoCoders\GeoCoderFactory;
use Belt\Spot\Services\GeoCoders\MockGeoCoder;

class GeoCoderFactoryTest extends BeltTestCase
{

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Services\GeoCoders\GeoCoderFactory::up
     * @covers \Belt\Spot\Services\GeoCoders\GeoCoderFactory::getDefaultDriver
     * @covers \Belt\Spot\Services\GeoCoders\GeoCoderFactory::configPath
     * @covers \Belt\Spot\Services\GeoCoders\GeoCoderFactory::configDefaults
     */
    public function test()
    {
        app()['config']->set('belt.spot.geocoders', [
            'default_driver' => 'test',
            'drivers' => [
                'GeoCoderFactoryTest' => [
                    'adapter' => MockGeoCoder::class
                ]
            ],
        ]);

        GeoCoderFactory::$adapters = [];

        # up
        $factory = new GeoCoderFactory();
        $this->assertEmpty(GeoCoderFactory::$adapters);
        try {
            $factory->up('missing');
            $this->exceptionNotThrown();
        } catch (\Exception $e) {

        }
        $this->assertInstanceOf(MockGeoCoder::class, $factory->up('GeoCoderFactoryTest'));
        $this->assertInstanceOf(MockGeoCoder::class, $factory->up('GeoCoderFactoryTest'));
        $this->assertNotEmpty(GeoCoderFactory::$adapters);

        # getDefaultDriver 1
        $this->assertEquals('test', $factory->getDefaultDriver());

        # getDefaultDriver 2
        app()['config']->set('belt.spot.geocoders.default_driver', '');
        $factory = new GeoCoderFactory();
        $this->assertEquals('GeoCoderFactoryTest', $factory->getDefaultDriver());

        # getDefaultDriver 3
        $factory = m::mock(GeoCoderFactory::class . '[config]');
        $factory->shouldReceive('config')->andReturn([]);
        $this->assertEquals('default', $factory->getDefaultDriver());

    }

}
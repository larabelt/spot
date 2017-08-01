<?php

namespace Belt\Spot\Services\GeoCoders;

use Belt\Core\Behaviors\HasConfig;

/**
 * Class GeoCoderFactory
 * @package Belt\Spot\Services\GeoCoders
 */
class GeoCoderFactory
{
    use HasConfig;

    /**
     * @var array
     */
    public static $adapters = [];

    /**
     * @return string
     */
    public function configPath()
    {
        return 'belt.spot.geocoders';
    }

    /**
     * @return array
     */
    public function configDefaults()
    {
        return [
            'default_driver' => 'google',
            'drivers' => [
                'google' => [
                    'adapter' => GoogleMapsGeoCoder::class,
                ]
            ]
        ];
    }

    /**
     * @param $driver
     * @return BaseGeoCoder
     * @throws \Exception
     */
    public function up($driver = null)
    {

        $driver = $driver ?: $this->getDefaultDriver();

        if (isset(static::$adapters[$driver])) {
            return static::$adapters[$driver];
        }

        $adapterClass = $this->config("drivers.$driver.adapter");

        if (!$adapterClass || !class_exists($adapterClass)) {
            throw new \Exception("adapter for geocoder driver '$driver' not specified or available");
        }

        return static::$adapters[$driver] = new $adapterClass($driver);
    }

    /**
     * Get default attachment driver
     *
     * @return string
     */
    public function getDefaultDriver()
    {

        if ($driver = $this->config('default_driver')) {
            return $driver;
        }

        foreach ($this->config('drivers', []) as $key => $driver) {
            return $key;
        }

        return 'default';
    }

}
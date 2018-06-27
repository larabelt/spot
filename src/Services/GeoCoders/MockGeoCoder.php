<?php

namespace Belt\Spot\Services\GeoCoders;

use Belt\Spot\Location;
use Exception;

/**
 * Class MockGeoCoder
 * @package Belt\Spot\Services\GeoCoders
 */
class MockGeoCoder extends BaseGeoCoder
{

    /**
     * @param $location
     * @return null
     * @throws Exception
     */
    public function geocode($location)
    {
        $this->reset();

        $this->result = [
            'input' => $location,
            'foo' => 'bar',
        ];

        $this->location = factory(Location::class)->make(['lat' => 1.23, 'lng' => 4.56]);
    }

}
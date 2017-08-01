<?php

namespace Belt\Spot\Services\GeoCoders;

use Belt\Spot\Address;
use Exception;

/**
 * Class MockGeoCoder
 * @package Belt\Spot\Services\GeoCoders
 */
class MockGeoCoder extends BaseGeoCoder
{

    /**
     * @param $address
     * @return null
     * @throws Exception
     */
    public function geocode($address)
    {
        $this->reset();

        $this->result = [
            'input' => $address,
            'foo' => 'bar',
        ];

        $this->address = factory(Address::class)->make(['lat' => 1.23, 'lng' => 4.56]);
    }

}
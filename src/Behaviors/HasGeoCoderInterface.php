<?php

namespace Belt\Spot\Behaviors;

use Belt\Spot\Services\GeoCoders;

interface HasGeoCoderInterface
{

    /**
     * @return GeoCoders\BaseGeoCoder
     */
    public function geocoder();

    /**
     * @param $str
     * @return GeoCoders\BaseGeoCoder
     */
    public function geocode($str);
}
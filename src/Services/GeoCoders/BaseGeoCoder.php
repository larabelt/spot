<?php
namespace Belt\Spot\Services\GeoCoders;

use Belt\Spot\Address;
use GuzzleHttp;

/**
 * Class BaseGeoCoder
 * @package Belt\Spot\Services\GeoCoders
 */
abstract class BaseGeoCoder
{
    /**
     * @var Address
     */
    public $address;

    /**
     * @var GuzzleHttp\Client
     */
    public $guzzle;

    /**
     * @var array
     */
    public $result = [];

    /**
     * @return GuzzleHttp\Client
     */
    public function guzzle()
    {
        return $this->guzzle ?: $this->guzzle = new GuzzleHttp\Client();
    }

    /**
     * @param $address
     * @return mixed
     */
    abstract function geocode($address);

}
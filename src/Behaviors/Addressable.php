<?php
namespace Belt\Spot\Behaviors;

use Belt\Spot\Address;

trait Addressable
{

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable')->orderBy('delta');
    }

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable')->orderBy('delta');
    }

}
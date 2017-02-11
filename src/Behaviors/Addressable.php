<?php
namespace Ohio\Spot\Behaviors;

use Ohio\Spot\Address;

trait Addressable
{

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable')->where('delta', 1.00);
    }

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable')->orderby('delta');
    }

}
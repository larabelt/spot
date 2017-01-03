<?php
namespace Ohio\Spot\Base\Behaviors;

use Ohio\Spot\Address\Address;

trait AddressableTrait
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
<?php

use Belt\Spot\Address;
use Illuminate\Database\Seeder;

class BeltSpotAddressSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Address::class, 25)->create();
    }
}

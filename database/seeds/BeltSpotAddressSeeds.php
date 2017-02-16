<?php

use Illuminate\Database\Seeder;

use Belt\Spot\Address;

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

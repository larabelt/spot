<?php

use Illuminate\Database\Seeder;

use Ohio\Spot\Address\Address;

class OhioSpotAddressSeeds extends Seeder
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

<?php

use Belt\Spot\Deal;
use Illuminate\Database\Seeder;

class BeltSpotDealSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Deal::class, 25)->create();
    }
}

<?php

use Illuminate\Database\Seeder;

class BeltSpotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BeltSpotAddressSeeds::class);
        $this->call(BeltSpotPlaceSeeds::class);
    }
}

<?php

use Illuminate\Database\Seeder;

class OhioSpotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OhioSpotAddressSeeds::class);
        $this->call(OhioSpotPlaceSeeds::class);
    }
}

<?php

namespace Ohio\Spot\Base\Commands;

use Ohio\Spot\Base\Services\GeoCoders\GoogleMapsGeoCoder;

use Illuminate\Console\Command;

class GeoCoderCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ohio-spot:geocoder {--address=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'run geocoder commands';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $address = $this->option('address');

        $geocoder = new GoogleMapsGeoCoder();

        if ($address) {
            $geocoder->geocode($address);

//            $address = $geocoder->address;
//            $address->addressable_id = 1;
//            $address->addressable_type = 'users';
//            s($address->toArray());
//            $address->save();
        }

    }

}
<?php

namespace Ohio\Spot\Commands;

use Ohio\Spot\Services\GeoCoders\GoogleMapsGeoCoder;

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
     * @var GoogleMapsGeoCoder
     */
    public $service;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $address = $this->option('address');

        $service = $this->getService();

        if ($address) {
            $service->geocode($address);
            $this->info(@\Kint::dump($service->result));
            $this->info(@\Kint::dump($service->address->toArray()));
        }

    }

    public function getService()
    {
        return $this->service ?: new GoogleMapsGeoCoder();
    }

}
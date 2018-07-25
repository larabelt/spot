<?php

namespace Belt\Spot\Commands;

use Belt\Spot\Behaviors\HasGeoCoder;
use Illuminate\Console\Command;

class GeoCoderCommand extends Command
{
    use HasGeoCoder;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'belt-spot:geocoder {--address=}';

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

        if ($address) {
            $this->geocode($address);
            $this->info(@\Kint::dump($this->geocoder()->result()));
            $this->info(@\Kint::dump($this->geocoder()->location()));
        }

    }

}
<?php

namespace Belt\Spot;

use Belt;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

/**
 * Class BeltSpotServiceProvider
 * @package Belt\Spot
 */
class BeltSpotServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Belt\Spot\Address::class => Belt\Spot\Policies\AddressPolicy::class,
        Belt\Spot\Place::class => Belt\Spot\Policies\PlacePolicy::class,
    ];

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__ . '/../routes/admin.php';
        include __DIR__ . '/../routes/api.php';
        include __DIR__ . '/../routes/web.php';
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(GateContract $gate, Router $router)
    {

        // set view paths
        // $this->loadViewsFrom(resource_path('belt/spot/views'), 'belt-spot');

        // set backup view paths
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'belt-spot');

        // policies
        $this->registerPolicies($gate);

        // morphMap
        Relation::morphMap([
            'addresses' => Belt\Spot\Address::class,
            'places' => Belt\Spot\Place::class,
        ]);

        // commands
        $this->commands(Belt\Spot\Commands\GeoCoderCommand::class);
        $this->commands(Belt\Spot\Commands\PublishCommand::class);
    }

    /**
     * Register the application's policies.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate $gate
     * @return void
     */
    public function registerPolicies(GateContract $gate)
    {
        foreach ($this->policies as $key => $value) {
            $gate->policy($key, $value);
        }
    }

}
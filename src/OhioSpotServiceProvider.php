<?php

namespace Ohio\Spot;

use Ohio;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class OhioSpotServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Ohio\Spot\Address::class => Ohio\Spot\Policies\AddressPolicy::class,
        Ohio\Spot\Place::class => Ohio\Spot\Policies\PlacePolicy::class,
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
        $this->loadViewsFrom(resource_path('ohio/spot/views'), 'ohio-spot');

        // set backup view paths
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'ohio-spot');

        // policies
        $this->registerPolicies($gate);

        // morphMap
        Relation::morphMap([
            'addresses' => Ohio\Spot\Address::class,
            'places' => Ohio\Spot\Place::class,
        ]);

        // commands
        $this->commands(Ohio\Spot\Commands\GeoCoderCommand::class);
        $this->commands(Ohio\Spot\Commands\PublishCommand::class);
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
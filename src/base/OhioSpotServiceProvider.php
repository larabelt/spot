<?php

namespace Ohio\Spot\Base;

use Validator;

use Ohio\Spot;

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
    protected $policies = [];

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__ . '/../../routes/admin.php';
        include __DIR__ . '/../../routes/api.php';
        include __DIR__ . '/../../routes/web.php';
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
            'addresses' => Spot\Address\Address::class,
            'places' => Spot\Place\Place::class,
        ]);

        // commands
        $this->commands(Spot\Base\Commands\GeoCoderCommand::class);
        $this->commands(Spot\Base\Commands\PublishCommand::class);
    }

    /**
     * Register the application's policies.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate $gate
     * @return void
     */
    public function registerPolicies(GateContract $gate)
    {
//        $gate->before(function ($user, $ability) {
//            if ($user->hasRole('SUPER')) {
//                return true;
//            }
//        });
//
//        foreach ($this->policies as $key => $value) {
//            $gate->policy($key, $value);
//        }
    }

}
<?php

namespace Belt\Spot;

use Belt, Event;
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
        Belt\Spot\Amenity::class => Belt\Spot\Policies\AmenityPolicy::class,
        Belt\Spot\Address::class => Belt\Spot\Policies\AddressPolicy::class,
        Belt\Spot\Deal::class => Belt\Spot\Policies\DealPolicy::class,
        Belt\Spot\Event::class => Belt\Spot\Policies\EventPolicy::class,
        Belt\Spot\Itinerary::class => Belt\Spot\Policies\ItineraryPolicy::class,
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

        # beltable values for global belt command
        $this->app['belt']->addPackage('spot', ['dir' => __DIR__ . '/..']);
        $this->app['belt']->publish('belt-spot:publish');
        $this->app['belt']->seeders('BeltSpotSeeder');
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(GateContract $gate, Router $router)
    {

        // set backup view paths
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'belt-spot');

        // set backup translation paths
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'belt-spot');

        // policies
        $this->registerPolicies($gate);

        // morphMap
        Relation::morphMap([
            'amenities' => Belt\Spot\Amenity::class,
            'addresses' => Belt\Spot\Address::class,
            'deals' => Belt\Spot\Deal::class,
            'events' => Belt\Spot\Event::class,
            'itineraries' => Belt\Spot\Itinerary::class,
            'places' => Belt\Spot\Place::class,
        ]);

        // route model binding
        $router->model('address', Belt\Spot\Address::class);
        $router->model('amenity', Belt\Spot\Amenity::class, function ($value) {
            return Belt\Spot\Amenity::sluggish($value)->firstOrFail();
        });
        $router->model('deal', Belt\Spot\Deal::class, function ($value) {
            return Belt\Spot\Deal::sluggish($value)->firstOrFail();
        });
        $router->model('event', Belt\Spot\Event::class, function ($value) {
            return Belt\Spot\Event::sluggish($value)->firstOrFail();
        });
        $router->model('itinerary', Belt\Spot\Itinerary::class, function ($value) {
            return Belt\Spot\Itinerary::sluggish($value)->firstOrFail();
        });
        $router->model('place', Belt\Spot\Place::class, function ($value) {
            return Belt\Spot\Place::sluggish($value)->firstOrFail();
        });

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
<?php

namespace Ohio\Spot\Base\Validators;

use Ohio\Spot\Address\Address;
use Request, Route;
use Illuminate\Validation\Validator;

class RouteValidator
{

    public function routeIsUnique($attribute, $value, $parameters, Validator $validator)
    {

        $validator->setFallbackMessages(
            array_merge($validator->getFallbackMessages(), [
                    'unique_route' => 'this route already exists'
            ])
        );

        $validates = false;

        $value = Address::normalizeUrl($value);

        try {
            $routes = Route::getRoutes();
            $request = Request::create($value);
            $routes->match($request);
            // route exists
        } catch (\Exception $e) {
            // route doesn't exist
            $validates = true;
        }

        return $validates;
    }

}
<?php

namespace Belt\Spot\Policies;

use Belt\Core\User;
use Belt\Core\Policies\BaseAdminPolicy;
use Belt\Spot\Itinerary;

/**
 * Class ItineraryPolicy
 * @package Belt\Spot\Policies
 */
class ItineraryPolicy extends BaseAdminPolicy
{
    /**
     * Determine whether the user can view the object.
     *
     * @param  User $auth
     * @return mixed
     */
    public function index(User $auth)
    {
        return true;
    }

    /**
     * Determine whether the user can view the object.
     *
     * @param  User $auth
     * @param  Itinerary $object
     * @return mixed
     */
    public function view(User $auth, $object)
    {
        return true;
    }
}
<?php

namespace Ohio\Spot\Policies;

use Ohio\Core\User;
use Ohio\Core\Policies\BaseAdminPolicy;
use Ohio\Spot\Place;

class PlacePolicy extends BaseAdminPolicy
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
     * @param  Place $object
     * @return mixed
     */
    public function view(User $auth, $object)
    {
        return true;
    }
}
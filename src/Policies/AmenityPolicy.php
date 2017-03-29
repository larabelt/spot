<?php

namespace Belt\Spot\Policies;

use Belt\Core\User;
use Belt\Core\Policies\BaseAdminPolicy;
use Belt\Spot\Amenity;

/**
 * Class AmenityPolicy
 * @package Belt\Spot\Policies
 */
class AmenityPolicy extends BaseAdminPolicy
{
    /**
     * Determine whether the user can view the object.
     *
     * @param  User $auth
     * @param  Amenity $object
     * @return mixed
     */
    public function view(User $auth, $object)
    {
        return true;
    }
}
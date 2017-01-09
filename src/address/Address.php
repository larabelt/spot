<?php
namespace Ohio\Spot\Address;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Ohio\Spot\Base\Behaviors\AddressTrait;
use Ohio\Spot\Base\Behaviors\LatLngTrait;

class Address extends Model
{

    use AddressTrait;
    use LatLngTrait;

    protected $table = 'addresses';

    protected $guarded = ['id'];

    /**
     * @var array
     */
    protected $appends = ['full'];

    /**
     * The Associated owning model
     *
     * @return MorphTo|Model
     */
    public function addressable()
    {
        return $this->morphTo();
    }

    public function __toString()
    {
        return $this->id;
    }

    public function setGeoServiceAttribute($value)
    {
        $this->attributes['geo_service'] = trim($value);
    }

    public function setGeoCodeAttribute($value)
    {
        $this->attributes['geo_code'] = trim($value);
    }

}
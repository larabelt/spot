<?php
namespace Ohio\Spot;

use Ohio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model implements
    Ohio\Spot\Behaviors\IncludesAddressInterface,
    Ohio\Spot\Behaviors\IncludesLatLngInterface
{

    use Ohio\Spot\Behaviors\IncludesAddress;
    use Ohio\Spot\Behaviors\IncludesLatLng;

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
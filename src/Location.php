<?php
namespace Belt\Spot;

use Belt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class Location
 * @package Belt\Spot
 */
class Location extends Model implements
    Belt\Spot\Behaviors\IncludesLocationInterface,
    Belt\Spot\Behaviors\IncludesLatLngInterface
{

    use Belt\Spot\Behaviors\IncludesLocation;
    use Belt\Spot\Behaviors\IncludesLatLng;

    /**
     * @var string
     */
    protected $table = 'locations';

    /**
     * @var array
     */
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
    public function locatable()
    {
        return $this->morphTo();
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->id;
    }

    /**
     * @param $value
     */
    public function setGeoServiceAttribute($value)
    {
        $this->primaryKey;
        $this->attributes['geo_service'] = trim($value);
    }

    /**
     * @param $value
     */
    public function setGeoCodeAttribute($value)
    {
        $this->attributes['geo_code'] = trim($value);
    }

    /**
     * @param $location
     * @param array $options
     * @return Model
     */
    public static function copy($location, $options = [])
    {
        $location = $location instanceof Location ? $location : self::find($location)->first();

        $clone = $location->replicate();
        $clone->locatable_id = array_get($options, 'locatable_id');
        $clone->push();

        return $clone;
    }

}
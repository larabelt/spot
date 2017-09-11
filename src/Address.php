<?php
namespace Belt\Spot;

use Belt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class Address
 * @package Belt\Spot
 */
class Address extends Model implements
    Belt\Spot\Behaviors\IncludesAddressInterface,
    Belt\Spot\Behaviors\IncludesLatLngInterface
{

    use Belt\Spot\Behaviors\IncludesAddress;
    use Belt\Spot\Behaviors\IncludesLatLng;

    /**
     * @var string
     */
    protected $table = 'addresses';

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
    public function addressable()
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
     * @param $address
     * @param array $options
     * @return Model
     */
    public static function copy($address, $options = [])
    {
        $address = $address instanceof Address ? $address : self::find($address)->first();

        $clone = $address->replicate();
        $clone->addressable_id = array_get($options, 'addressable_id');
        $clone->push();

        return $clone;
    }

}
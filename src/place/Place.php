<?php
namespace Ohio\Spot\Place;

use Illuminate\Database\Eloquent\Model;
use Ohio\Core\Base\Behaviors\SluggableTrait;

class Place extends Model
{
    use SluggableTrait;

    protected $morphClass = 'spot/place';

    protected $table = 'places';

    protected $fillable = ['name'];

    public function __toString()
    {
        return $this->name;
    }

    public function setBodyAttribute($value)
    {
        $this->attributes['body'] = trim($value);
    }

    /**
     * Return places associated with placegable
     *
     * @param $query
     * @param $placegable_type
     * @param $placegable_id
     * @return mixed
     */
    public function scopePlaceged($query, $placegable_type, $placegable_id)
    {
        $query->select(['places.*']);
        $query->join('placegables', 'placegables.place_id', '=', 'places.id');
        $query->where('placegables.placegable_type', $placegable_type);
        $query->where('placegables.placegable_id', $placegable_id);

        return $query;
    }

    /**
     * Return places not associated with placegable
     *
     * @param $query
     * @param $placegable_type
     * @param $placegable_id
     * @return mixed
     */
    public function scopeNotPlaceged($query, $placegable_type, $placegable_id)
    {
        $query->select(['places.*']);
        $query->leftJoin('placegables', function ($subQB) use ($placegable_type, $placegable_id) {
            $subQB->on('placegables.place_id', '=', 'places.id');
            $subQB->where('placegables.placegable_id', $placegable_id);
            $subQB->where('placegables.placegable_type', $placegable_type);
        });
        $query->whereNull('placegables.id');

        return $query;
    }

}
<?php
namespace Belt\Spot;

use Belt;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Amenity
 * @package Belt\Spot
 */
class Amenity extends Model implements
    Belt\Core\Behaviors\IsNestedInterface,
    Belt\Core\Behaviors\SluggableInterface,
    Belt\Content\Behaviors\IncludesContentInterface
{
    use Belt\Core\Behaviors\IsNested;
    use Belt\Core\Behaviors\Sluggable;
    use Belt\Content\Behaviors\IncludesContent;

    /**
     * @var string
     */
    protected $morphClass = 'amenities';

    /**
     * @var string
     */
    protected $table = 'amenities';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @var array
     */
    protected $appends = ['nested_name', 'hierarchy'];

    /**
     * Return amenities associated with amenity_spots
     *
     * @param $query
     * @param $owner_type
     * @param $owner_id
     * @return mixed
     */
    public function scopeAmenitied($query, $owner_type, $owner_id)
    {
        $query->select(['amenities.*']);
        $query->join('amenity_spots', 'amenity_spots.amenity_id', '=', 'amenities.id');
        $query->where('amenity_spots.owner_type', $owner_type);
        $query->where('amenity_spots.owner_id', $owner_id);

        return $query;
    }

    /**
     * Return amenities not associated with amenitygable
     *
     * @param $query
     * @param $owner_type
     * @param $owner_id
     * @return mixed
     */
    public function scopeNotAmenitied($query, $owner_type, $owner_id)
    {
        $query->select(['amenities.*']);
        $query->leftJoin('amenity_spots', function ($subQB) use ($owner_type, $owner_id) {
            $subQB->on('amenity_spots.amenity_id', '=', 'amenities.id');
            $subQB->where('amenity_spots.owner_id', $owner_id);
            $subQB->where('amenity_spots.owner_type', $owner_type);
        });
        $query->whereNull('amenity_spots.id');

        return $query;
    }

}
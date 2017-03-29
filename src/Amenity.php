<?php
namespace Belt\Spot;

use Belt;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Amenity
 * @package Belt\Spot
 */
class Amenity extends Model implements
    Belt\Core\Behaviors\SluggableInterface,
    Belt\Content\Behaviors\IncludesContentInterface
{
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

}
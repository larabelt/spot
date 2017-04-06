<?php
namespace Belt\Spot;

use Belt;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 * @package Belt\Spot
 */
class Event extends Model implements
    Belt\Core\Behaviors\SluggableInterface,
    Belt\Content\Behaviors\HandleableInterface,
    Belt\Content\Behaviors\IncludesContentInterface,
    Belt\Content\Behaviors\IncludesSeoInterface,
    Belt\Glue\Behaviors\CategorizableInterface,
    Belt\Glue\Behaviors\TaggableInterface,
    Belt\Spot\Behaviors\AddressableInterface,
    Belt\Clip\Behaviors\ClippableInterface,
    Belt\Content\Behaviors\HasSectionsInterface,
    Belt\Content\Behaviors\IncludesTemplateInterface
{
    use Belt\Core\Behaviors\HasSortableTrait;
    use Belt\Core\Behaviors\Sluggable;
    use Belt\Content\Behaviors\IncludesContent;
    use Belt\Content\Behaviors\Handleable;
    use Belt\Content\Behaviors\IncludesSeo;
    use Belt\Glue\Behaviors\Categorizable;
    use Belt\Glue\Behaviors\Taggable;
    use Belt\Spot\Behaviors\Addressable;
    use Belt\Clip\Behaviors\Clippable;
    use Belt\Content\Behaviors\HasSections;
    use Belt\Content\Behaviors\IncludesTemplate;

    /**
     * @var string
     */
    protected $morphClass = 'events';

    /**
     * @var string
     */
    protected $table = 'events';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @var array
     */
    protected $dates = ['starts_at', 'ends_at', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @var array
     */
    protected $appends = ['image'];

    /**
     * @var array
     */
    public static $presets = [
        [100, 100, 'fit'],
        [222, 222, 'resize'],
        [333, 333, 'resize'],
        [500, 500, 'resize'],
    ];

    /**
     * @param $value
     */
    public function setIsSearchableAttribute($value)
    {
        $this->attributes['is_searchable'] = boolval($value);
    }

}
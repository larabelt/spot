<?php

namespace Belt\Spot;

use Belt;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Place
 * @package Belt\Spot
 */
class Place extends Model implements
    Belt\Core\Behaviors\SluggableInterface,
    Belt\Core\Behaviors\TypeInterface,
    Belt\Content\Behaviors\HandleableInterface,
    Belt\Content\Behaviors\IncludesContentInterface,
    Belt\Content\Behaviors\IncludesSeoInterface,
    Belt\Glue\Behaviors\CategorizableInterface,
    Belt\Glue\Behaviors\TaggableInterface,
    Belt\Spot\Behaviors\AddressableInterface,
    Belt\Spot\Behaviors\HasAmenitiesInterface,
    Belt\Clip\Behaviors\ClippableInterface,
    Belt\Content\Behaviors\HasSectionsInterface,
    Belt\Content\Behaviors\IncludesTemplateInterface
{
    use Belt\Core\Behaviors\HasSortableTrait;
    use Belt\Core\Behaviors\Sluggable;
    use Belt\Core\Behaviors\TypeTrait;
    use Belt\Clip\Behaviors\Clippable;
    use Belt\Content\Behaviors\IncludesContent;
    use Belt\Content\Behaviors\Handleable;
    use Belt\Content\Behaviors\IncludesSeo;
    use Belt\Glue\Behaviors\Categorizable;
    use Belt\Glue\Behaviors\Taggable;
    use Belt\Spot\Behaviors\Addressable;
    use Belt\Spot\Behaviors\HasAmenities;
    use Belt\Content\Behaviors\HasSections;
    use Belt\Content\Behaviors\IncludesTemplate;

    /**
     * @var string
     */
    protected $morphClass = 'places';

    /**
     * @var string
     */
    protected $table = 'places';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @var array
     */
    protected $appends = ['image', 'type', 'url'];

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

    public function getUrlAttribute()
    {
        if( $this->handle ) {
            return $this->handle->url;
        }

        return 'events/' . $this->id . '/' . $this->slug;
    }
}
<?php
namespace Belt\Spot;

use Belt;
use Illuminate\Database\Eloquent\Model;

class Place extends Model implements
    Belt\Core\Behaviors\SluggableInterface,
    Belt\Content\Behaviors\HandleableInterface,
    Belt\Content\Behaviors\IncludesContentInterface,
    Belt\Content\Behaviors\IncludesSeoInterface,
    Belt\Glue\Behaviors\TaggableInterface,
    Belt\Spot\Behaviors\AddressableInterface,
    Belt\Clip\Behaviors\ClippableInterface
{
    use Belt\Core\Behaviors\Sluggable;
    use Belt\Content\Behaviors\IncludesContent;
    use Belt\Content\Behaviors\Handleable;
    use Belt\Content\Behaviors\IncludesSeo;
    use Belt\Glue\Behaviors\Taggable;
    use Belt\Spot\Behaviors\Addressable;
    use Belt\Clip\Behaviors\Clippable;

    protected $morphClass = 'places';

    protected $table = 'places';

    protected $fillable = ['name'];

    public static $presets = [
        [100, 100, 'fit'],
        [222, 222, 'resize'],
        [333, 333, 'resize'],
        [500, 500, 'resize'],
    ];

    public function setIsSearchableAttribute($value)
    {
        $this->attributes['is_searchable'] = boolval($value);
    }

}
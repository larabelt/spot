<?php
namespace Ohio\Spot;

use Ohio;
use Illuminate\Database\Eloquent\Model;

class Place extends Model implements
    Ohio\Core\Behaviors\SluggableInterface,
    Ohio\Content\Behaviors\HandleableInterface,
    Ohio\Content\Behaviors\IncludesContentInterface,
    Ohio\Content\Behaviors\IncludesSeoInterface,
    Ohio\Content\Behaviors\TaggableInterface,
    Ohio\Spot\Behaviors\AddressableInterface,
    Ohio\Storage\Behaviors\FileableInterface
{
    use Ohio\Core\Behaviors\Sluggable;
    use Ohio\Content\Behaviors\IncludesContent;
    use Ohio\Content\Behaviors\Handleable;
    use Ohio\Content\Behaviors\IncludesSeo;
    use Ohio\Content\Behaviors\Taggable;
    use Ohio\Spot\Behaviors\Addressable;
    use Ohio\Storage\Behaviors\Fileable;

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
<?php
namespace Ohio\Spot;

use Ohio\Core;
use Ohio\Content;
use Ohio\Storage;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use Core\Behaviors\Sluggable;
    use Content\Behaviors\ContentTrait;
    use Content\Behaviors\HandleableTrait;
    use Content\Behaviors\SeoTrait;
    use Content\Behaviors\TaggableTrait;
    use Storage\Behaviors\FileableTrait;

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
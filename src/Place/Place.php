<?php
namespace Ohio\Spot\Place;

use Ohio\Core;
use Ohio\Content;
use Ohio\Storage;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use Core\Base\Behaviors\SluggableTrait;
    use Content\Base\Behaviors\ContentTrait;
    use Content\Base\Behaviors\HandleableTrait;
    use Content\Base\Behaviors\SeoTrait;
    use Content\Base\Behaviors\TaggableTrait;
    use Storage\Base\Behaviors\FileableTrait;

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
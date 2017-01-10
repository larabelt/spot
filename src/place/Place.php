<?php
namespace Ohio\Spot\Place;

use Ohio\Core;
use Ohio\Content;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use Core\Base\Behaviors\SluggableTrait;
    use Content\Base\Behaviors\ContentTrait;
    use Content\Base\Behaviors\HandleableTrait;
    use Content\Base\Behaviors\SeoTrait;
    use Content\Base\Behaviors\TaggableTrait;

    protected $morphClass = 'places';

    protected $table = 'places';

    protected $fillable = ['name'];

    public function setIsSearchableAttribute($value)
    {
        $this->attributes['is_searchable'] = boolval($value);
    }

}
<?php

namespace Belt\Spot;

use Belt;
use Belt\Clip\Attachment;
use Illuminate\Database\Eloquent\Model;
use Rutorika\Sortable\BelongsToSortedManyTrait;

/**
 * Class Itinerary
 * @package Belt\Spot
 */
class Itinerary extends Model implements
    Belt\Core\Behaviors\SluggableInterface,
    Belt\Core\Behaviors\TypeInterface,
    Belt\Clip\Behaviors\ClippableInterface,
    Belt\Content\Behaviors\HasSectionsInterface,
    Belt\Content\Behaviors\IncludesContentInterface,
    Belt\Content\Behaviors\IncludesTemplateInterface,
    Belt\Content\Behaviors\IncludesSeoInterface,
    Belt\Content\Behaviors\SectionableInterface,
    Belt\Glue\Behaviors\CategorizableInterface,
    Belt\Glue\Behaviors\TaggableInterface,
    Belt\Content\Behaviors\HandleableInterface
{
    use Belt\Core\Behaviors\HasSortableTrait;
    use Belt\Core\Behaviors\Sluggable;
    use Belt\Core\Behaviors\TypeTrait;
    use Belt\Clip\Behaviors\Clippable;
    use Belt\Content\Behaviors\HasSections;
    use Belt\Content\Behaviors\IncludesContent;
    use Belt\Content\Behaviors\IncludesSeo;
    use Belt\Content\Behaviors\IncludesTemplate;
    use Belt\Content\Behaviors\Sectionable;
    use Belt\Glue\Behaviors\Categorizable;
    use Belt\Glue\Behaviors\Taggable;
    use BelongsToSortedManyTrait;
    use Belt\Content\Behaviors\Handleable;


    /**
     * @var string
     */
    protected $morphClass = 'itineraries';

    /**
     * @var string
     */
    protected $table = 'itineraries';

    /**
     * @var array
     */
    protected $fillable = ['name', 'body'];

    /**
     * @var array
     */
    protected $appends = ['image', 'type', 'default_url', 'morph_class'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function places()
    {
        return $this->hasMany(ItineraryPlace::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function itineraryPlaces()
    {
        return $this->hasMany(ItineraryPlace::class)->with('place');
    }

}
<?php
namespace Belt\Spot;

use Belt;
use Belt\Content\Handle;
use Belt\Content\Section;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Deal
 * @package Belt\Spot
 */
class Deal extends Model implements
    Belt\Core\Behaviors\ParamableInterface,
    Belt\Core\Behaviors\PriorityInterface,
    Belt\Core\Behaviors\SluggableInterface,
    Belt\Core\Behaviors\TeamableInterface,
    Belt\Core\Behaviors\TypeInterface,
    Belt\Content\Behaviors\ClippableInterface,
    Belt\Content\Behaviors\HandleableInterface,
    Belt\Content\Behaviors\HasSectionsInterface,
    Belt\Content\Behaviors\IncludesContentInterface,
    Belt\Content\Behaviors\IncludesSeoInterface,
    Belt\Core\Behaviors\IncludesSubtypesInterface,
    Belt\Content\Behaviors\TermableInterface,
    Belt\Spot\Behaviors\LocatableInterface,
    Belt\Spot\Behaviors\RateableInterface
{
    use Belt\Core\Behaviors\HasSortableTrait;
    use Belt\Core\Behaviors\PriorityTrait;
    use Belt\Core\Behaviors\Sluggable;
    use Belt\Core\Behaviors\Teamable;
    use Belt\Core\Behaviors\TypeTrait;
    use Belt\Content\Behaviors\Clippable;
    use Belt\Content\Behaviors\Handleable;
    use Belt\Content\Behaviors\HasSections;
    use Belt\Content\Behaviors\IncludesContent;
    use Belt\Content\Behaviors\IncludesSeo;
    use Belt\Core\Behaviors\IncludesSubtypes;
    use Belt\Content\Behaviors\Termable;
    use Belt\Spot\Behaviors\Locatable;
    use Belt\Spot\Behaviors\Rateable;

    /**
     * @var string
     */
    protected $morphClass = 'deals';

    /**
     * @var string
     */
    protected $table = 'deals';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @var array
     */
    protected $dates = ['starts_at', 'ends_at', 'created_at', 'updated_at', 'deleted_at', 'params'];

    /**
     * @var array
     */
    protected $with = ['handles'];

    /**
     * @var array
     */
    protected $appends = ['image', 'morph_class'];

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

    /**
     * @param $deal
     * @return Model
     */
    public static function copy($deal)
    {
        $deal = $deal instanceof Deal ? $deal : self::sluggish($deal)->first();

        $clone = $deal->replicate();
        $clone->slug .= '-' . strtotime('now');
        $clone->push();

        foreach ($deal->locations as $location) {
            Location::copy($location, ['locatable_id' => $clone->id]);
        }

        foreach ($deal->attachments as $attachment) {
            $clone->attachments()->attach($attachment);
        }

        foreach ($deal->handles as $handle) {
            Handle::copy($handle, ['handleable_id' => $clone->id]);
        }

        foreach ($deal->sections as $section) {
            Section::copy($section, ['owner_id' => $clone->id]);
        }

        foreach ($deal->terms as $term) {
            $clone->terms()->attach($term);
        }

        foreach ($deal->params as $param) {
            $clone->saveParam($param->key, $param->value);
        }

        return $clone;
    }

}
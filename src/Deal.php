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
    Belt\Core\Behaviors\SluggableInterface,
    Belt\Core\Behaviors\TeamableInterface,
    Belt\Core\Behaviors\TypeInterface,
    Belt\Content\Behaviors\HandleableInterface,
    Belt\Content\Behaviors\IncludesContentInterface,
    Belt\Content\Behaviors\IncludesSeoInterface,
    Belt\Glue\Behaviors\CategorizableInterface,
    Belt\Glue\Behaviors\TaggableInterface,
    Belt\Spot\Behaviors\AddressableInterface,
    Belt\Clip\Behaviors\ClippableInterface
{
    use Belt\Core\Behaviors\HasSortableTrait;
    use Belt\Core\Behaviors\Sluggable;
    use Belt\Core\Behaviors\Teamable;
    use Belt\Core\Behaviors\TypeTrait;
    use Belt\Clip\Behaviors\Clippable;
    use Belt\Content\Behaviors\IncludesContent;
    use Belt\Content\Behaviors\Handleable;
    use Belt\Content\Behaviors\IncludesSeo;
    use Belt\Glue\Behaviors\Categorizable;
    use Belt\Glue\Behaviors\Taggable;
    use Belt\Spot\Behaviors\Addressable;

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
    protected $dates = ['starts_at', 'ends_at', 'created_at', 'updated_at', 'deleted_at'];

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

        foreach ($deal->addresses as $address) {
            Address::copy($address, ['addressable_id' => $clone->id]);
        }

        foreach ($deal->attachments as $attachment) {
            $clone->attachments()->attach($attachment);
        }

        foreach ($deal->categories as $category) {
            $clone->categories()->attach($category);
        }

        foreach ($deal->handles as $handle) {
            Handle::copy($handle, ['handleable_id' => $clone->id]);
        }

        foreach ($deal->tags as $tag) {
            $clone->tags()->attach($tag);
        }

        return $clone;
    }

}
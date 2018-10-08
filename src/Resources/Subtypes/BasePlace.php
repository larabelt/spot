<?php

namespace Belt\Spot\Resources\Subtypes;

use Belt;

/**
 * Class BasePlace
 * @package Belt\Core\Resources\Params
 */
class BasePlace extends Belt\Core\Resources\BaseSubtype
{
    use Belt\Core\Resources\Traits\HasForceCompile,
        Belt\Core\Resources\Traits\HasSectionable;

    /**
     * @return mixed
     */
    public function toArray()
    {
        $array = parent::toArray();
        $array['force_compile'] = $this->isForceCompile();
        $array['sectionable'] = $this->isSectionable();

        return $array;
    }
}
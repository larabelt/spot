<?php
namespace Belt\Spot\Behaviors;

trait IncludesAddress
{

    /**
     * Get full address string
     *
     * @param string $glue
     * @return string
     */
    public function full($glue = ', ')
    {
        $lines = [];
        $lines = $this->name ? array_merge($lines, [$this->name]) : $lines;
        $lines = $this->line1 ? array_merge($lines, [$this->line1]) : $lines;
        $lines = $this->line2 ? array_merge($lines, [$this->line2]) : $lines;
        $lines = $this->line3 ? array_merge($lines, [$this->line3]) : $lines;
        $lines = $this->line4 ? array_merge($lines, [$this->line4]) : $lines;

        $lines[] = sprintf('%s, %s %s', $this->locality, $this->region, $this->postcode);
        $lines = $this->sub_locality ? array_merge($lines, [$this->sub_locality]) : $lines;
        $lines[] = $this->country;

        return implode($glue, $lines);
    }

    /**
     * Get full address string
     *
     * @return string
     */
    public function getFullAttribute()
    {
        return $this->full();
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper(substr(trim($value), 0, 100));
    }

    public function setNicknameAttribute($value)
    {
        $this->attributes['nickname'] = strtoupper(substr(trim($value), 0, 25));
    }

    public function setLine1Attribute($value)
    {
        $this->attributes['line1'] = strtoupper(substr(trim($value), 0, 100));
    }

    public function setLine2Attribute($value)
    {
        $this->attributes['line2'] = strtoupper(substr(trim($value), 0, 100));
    }

    public function setLine3Attribute($value)
    {
        $this->attributes['line3'] = strtoupper(substr(trim($value), 0, 100));
    }

    public function setLine4Attribute($value)
    {
        $this->attributes['line4'] = strtoupper(substr(trim($value), 0, 100));
    }

    public function setLocalityAttribute($value)
    {
        $this->attributes['locality'] = strtoupper(substr(trim($value), 0, 100));
    }

    public function setSubLocalityAttribute($value)
    {
        $this->attributes['sub_locality'] = strtoupper(substr(trim($value), 0, 100));
    }

    public function setRegionAttribute($value)
    {
        $this->attributes['region'] = strtoupper(substr(trim($value), 0, 100));
    }

    public function setPostcodeAttribute($value)
    {
        $this->attributes['postcode'] = strtoupper(substr(trim($value), 0, 25));
    }

    public function setCountryAttribute($value)
    {
        $this->attributes['country'] = strtoupper(substr(trim($value), 0, 2));
    }

    public function setOriginalAttribute($value)
    {
        $this->attributes['original'] = strtoupper(trim($value));
    }

    public function setFormattedAttribute($value)
    {
        $this->attributes['formatted'] = strtoupper(trim($value));
    }

}
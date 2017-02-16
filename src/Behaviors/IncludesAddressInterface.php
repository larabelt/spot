<?php
namespace Belt\Spot\Behaviors;

interface IncludesAddressInterface
{

    /**
     * Get full address string
     *
     * @param string $glue
     * @return string
     */
    public function full($glue = ', ');

    /**
     * Get full address string
     *
     * @return string
     */
    public function getFullAttribute();

    public function setNameAttribute($value);

    public function setNicknameAttribute($value);

    public function setLine1Attribute($value);

    public function setLine2Attribute($value);

    public function setLine3Attribute($value);

    public function setLine4Attribute($value);

    public function setLocalityAttribute($value);

    public function setSubLocalityAttribute($value);

    public function setRegionAttribute($value);

    public function setPostcodeAttribute($value);

    public function setCountryAttribute($value);

    public function setOriginalAttribute($value);

    public function setFormattedAttribute($value);

}
<?php

use Illuminate\Database\Eloquent\Model;
use Ohio\Spot\Base\Behaviors\SeoTrait;

class SeoTraitTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers \Ohio\Spot\Base\Behaviors\SeoTrait::setMetaTitleAttribute
     * @covers \Ohio\Spot\Base\Behaviors\SeoTrait::setMetaKeywordsAttribute
     * @covers \Ohio\Spot\Base\Behaviors\SeoTrait::setMetaDescriptionAttribute
     * @covers \Ohio\Spot\Base\Behaviors\SeoTrait::getMetaTitleAttribute
     */
    public function test()
    {
        $seoStub = new SeoTraitTestStub();

        # meta title
        $seoStub->setAttribute('name', 'Test');
        $this->assertEquals('Test', $seoStub->meta_title);
        $seoStub->meta_title = ' Meta Test ';
        $this->assertEquals('Meta Test', $seoStub->meta_title);

        # meta description
        $seoStub->meta_description = ' Test ';
        $this->assertEquals('Test', $seoStub->meta_description);

        # meta keywords
        $seoStub->meta_keywords = ' Test ';
        $this->assertEquals('Test', $seoStub->meta_keywords);
    }

}

class SeoTraitTestStub extends Model
{
    use SeoTrait;
}
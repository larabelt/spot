<?php

use Illuminate\Database\Eloquent\Model;
use Belt\Spot\Behaviors\Rateable;

class RateableTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Belt\Spot\Behaviors\Rateable::setRatingAttribute
     */
    public function test()
    {
        $rateable = new RateableTestStub();

        # rating
        $rateable->setRatingAttribute(5.5);
        $this->assertEquals(5.5, $rateable->rating);

        # rating
        $rateable->setRatingAttribute(0);
        $this->assertNull($rateable->rating);
    }

}

class RateableTestStub extends Model
{
    use Rateable;
}
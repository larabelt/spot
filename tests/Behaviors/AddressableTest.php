<?php

use Mockery as m;

use Ohio\Core\Testing\OhioTestCase;
use Ohio\Spot\Behaviors\Addressable;
use Ohio\Spot\Address;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class AddressableTest extends OhioTestCase
{

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Ohio\Spot\Behaviors\Addressable::address
     * @covers \Ohio\Spot\Behaviors\Addressable::addresses
     */
    public function test()
    {
        # address
        $morphOne = m::mock(Relation::class);
        $morphOne->shouldReceive('where')->withArgs(['delta', 1.00]);
        $pageMock = m::mock(AddressableTestStub::class . '[morphOne]');
        $pageMock->shouldReceive('morphOne')->withArgs([Address::class, 'addressable'])->andReturn($morphOne);
        $pageMock->shouldReceive('address');
        $pageMock->address();

        # addresses
        $morphMany = m::mock(Relation::class);
        $morphMany->shouldReceive('orderby')->withArgs(['delta']);
        $pageMock = m::mock(AddressableTestStub::class . '[morphMany]');
        $pageMock->shouldReceive('morphMany')->withArgs([Address::class, 'addressable'])->andReturn($morphMany);
        $pageMock->shouldReceive('addresses');
        $pageMock->addresses();
    }

}

class AddressableTestStub extends Model
{
    use Addressable;
}
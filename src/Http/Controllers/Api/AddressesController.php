<?php

namespace Belt\Spot\Http\Controllers\Api;

use Belt\Core\Http\Controllers\ApiController;
use Belt\Core\Http\Controllers\Behaviors\Positionable;
use Belt\Spot\Address;
use Belt\Spot\Http\Requests;
use Belt\Core\Helpers\MorphHelper;

class AddressesController extends ApiController
{

    //use Positionable;

    /**
     * @var Address
     */
    public $address;

    /**
     * @var MorphHelper
     */
    public $morphHelper;

    public function __construct(Address $address, MorphHelper $morphHelper)
    {
        $this->address = $address;
        $this->morphHelper = $morphHelper;
    }

    public function address($id, $addressable = null)
    {
        $qb = $this->address->query();

        if ($addressable) {
            $qb->where('addressable_type', $addressable->getMorphClass());
            $qb->where('addressable_id', $addressable->id);
        }

        $address = $qb->where('addresses.id', $id)->first();

        return $address ?: $this->abort(404);
    }

    public function addressable($addressable_type, $addressable_id)
    {
        $addressable = $this->morphHelper->morph($addressable_type, $addressable_id);

        return $addressable ?: $this->abort(404);
    }

    /**
     * Display a listing of the resource.
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function index(Requests\PaginateAddresses $request, $addressable_type, $addressable_id)
    {

        $request->reCapture();

        $owner = $this->addressable($addressable_type, $addressable_id);

        $this->authorize('view', $owner);

        $request->merge([
            'addressable_id' => $owner->id,
            'addressable_type' => $owner->getMorphClass()
        ]);

        $paginator = $this->paginator($this->address->query(), $request);

        return response()->json($paginator->toArray());
    }

    /**
     * Store a newly created resource in spot.
     *
     * @param  Requests\StoreAddress $request
     * @param  string $addressable_type
     * @param  string $addressable_id
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreAddress $request, $addressable_type, $addressable_id)
    {
        $owner = $this->addressable($addressable_type, $addressable_id);

        $this->authorize('update', $owner);

        $input = $request->all();

        $address = $this->address->create([
            'addressable_id' => $addressable_id,
            'addressable_type' => $addressable_type,
        ]);

        $this->set($address, $input, [
            'is_active',
            'is_locked',
            'name',
            'nickname',
            'line1',
            'line2',
            'line3',
            'line4',
            'locality',
            'sub_locality',
            'postcode',
            'region',
            'country',
            'lat',
            'north_lat',
            'south_lat',
            'lng',
            'east_lng',
            'west_lng',
            'delta',
            'altitude',
            'zoom',
        ]);

        $address->save();

        return response()->json($address, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($addressable_type, $addressable_id, $id)
    {
        $owner = $this->addressable($addressable_type, $addressable_id);

        $this->authorize('view', $owner);

        $address = $this->address($id, $owner);

        return response()->json($address);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Requests\UpdateAddress $request
     * @param  string $addressable_type
     * @param  string $addressable_id
     * @param  string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdateAddress $request, $addressable_type, $addressable_id, $id)
    {
        $owner = $this->addressable($addressable_type, $addressable_id);

        $this->authorize('update', $owner);

        $input = $request->all();

        $address = $this->address($id);

        $this->set($address, $input, [
            'is_active',
            'is_locked',
            'name',
            'nickname',
            'line1',
            'line2',
            'line3',
            'line4',
            'locality',
            'sub_locality',
            'postcode',
            'region',
            'country',
            'lat',
            'north_lat',
            'south_lat',
            'lng',
            'east_lng',
            'west_lng',
            'delta',
            'altitude',
            'zoom',
        ]);

        $address->save();

        return response()->json($address);
    }

    /**
     * Remove the specified resource from spot.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($addressable_type, $addressable_id, $id)
    {
        $owner = $this->addressable($addressable_type, $addressable_id);

        $this->authorize('update', $owner);

        $address = $this->address($id);

        $address->delete();

        return response()->json(null, 204);
    }
}

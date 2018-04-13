<?php

namespace Belt\Spot\Http\Controllers\Api;

use Belt\Core\Http\Controllers\ApiController;
use Belt\Core\Http\Controllers\Morphable;
use Belt\Spot\Address;
use Belt\Spot\Behaviors\AddressableInterface;
use Belt\Spot\Http\Requests;
use Belt\Core\Helpers\MorphHelper;
use Belt\Spot\Behaviors\HasGeoCoder;
use Illuminate\Http\Request;

class AddressesController extends ApiController
{
    use HasGeoCoder, Morphable;

    /**
     * @var Address
     */
    public $address;

    public function __construct(Address $address, MorphHelper $morphHelper)
    {
        $this->address = $address;
    }

    /**
     * @param AddressableInterface $owner
     * @param Address $address
     */
    public function contains(AddressableInterface $owner, Address $address)
    {
        if (!$owner->addresses->contains($address->id)) {
            $this->abort(404, 'item does not have this address');
        }
    }

    /**
     * @param array $input
     * @param array $results
     * @param array $include
     * @return array
     */
    public function mergeGeocode($input = [], $results = [], $include = [])
    {
        foreach ($results as $key => $value) {
            if ($include == '_all' || in_array($key, $include)) {
                $input[$key] = $value;
            }
        }

        return $input;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $addressable_type, $addressable_id)
    {

        $request = Requests\PaginateAddresses::extend($request);

        $owner = $this->morphable($addressable_type, $addressable_id);

        $this->authorize(['view', 'create', 'update', 'delete'], $owner);

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
     * @param Requests\StoreAddress $request
     * @param string $addressable_type
     * @param string $addressable_id
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreAddress $request, $addressable_type, $addressable_id)
    {
        $owner = $this->morphable($addressable_type, $addressable_id);

        $this->authorize('update', $owner);

        $input = $request->all();

        if ($_address = array_get($input, '_address')) {
            $input = $this->mergeGeocode($input, $this->geocode($_address)->address(), '_all');
        }

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
            'location',
        ]);

        $address->save();

        return response()->json($address, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Address $address
     *
     * @return \Illuminate\Http\Response
     */
    public function show($addressable_type, $addressable_id, Address $address)
    {
        $owner = $this->morphable($addressable_type, $addressable_id);

        $this->authorize(['view', 'create', 'update', 'delete'], $owner);

        $this->contains($owner, $address);

        return response()->json($address);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Requests\UpdateAddress $request
     * @param string $addressable_type
     * @param string $addressable_id
     * @param Address $address
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdateAddress $request, $addressable_type, $addressable_id, Address $address)
    {
        $owner = $this->morphable($addressable_type, $addressable_id);

        $this->authorize('update', $owner);

        $this->contains($owner, $address);

        $input = $request->all();

        if ($geocode = array_get($input, '_geocode', [])) {
            $str = $address->full(',', false);
            $include = $geocode == '_all' ? '_all' : explode(',', $geocode);
            $input = $this->mergeGeocode($input, $this->geocode($str)->address(), $include);
        }

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
            'location',
        ]);

        $address->save();

        return response()->json($address);
    }

    /**
     * Remove the specified resource from spot.
     *
     * @param Address $address
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($addressable_type, $addressable_id, Address $address)
    {
        $owner = $this->morphable($addressable_type, $addressable_id);

        $this->authorize('update', $owner);

        $this->contains($owner, $address);

        $address->delete();

        return response()->json(null, 204);
    }
}

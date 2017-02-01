<?php

namespace Ohio\Spot\Http\Controllers\Api;

use Route;
use Ohio\Core\Http\Controllers\ApiController;
use Ohio\Spot\Address;
use Ohio\Spot\Http\Requests;
use Illuminate\Http\Request;

class AddressesController extends ApiController
{

    /**
     * @var Address
     */
    public $address;

    /**
     * ApiController constructor.
     * @param Address $address
     */
    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    public function get($id)
    {
        return $this->address->find($id) ?: $this->abort(404);
    }

    /**
     * Display a listing of the resource.
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function index(Requests\PaginateAddresses $request)
    {
        $this->authorize('index', Address::class);

        $request->reCapture();

        $paginator = $this->paginator($this->address->query(), $request);

        return response()->json($paginator->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Requests\StoreAddress $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreAddress $request)
    {
        $this->authorize('store', Address::class);

        $input = $request->all();

        $address = $this->address->create([
            'addressable_id' => $input['addressable_id'],
            'addressable_type' => $input['addressable_type'],
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
        ]);

        $address->save();

        return response()->json($address);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = $this->get($id);

        $this->authorize('view', $address);

        return response()->json($address);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Requests\UpdateAddress $request
     * @param  string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdateAddress $request, $id)
    {
        $address = $this->get($id);

        $this->authorize('update', $address);

        $input = $request->all();

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
        ]);

        $address->save();

        return response()->json($address);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = $this->get($id);

        $this->authorize('delete', $address);

        $address->delete();

        return response()->json(null, 204);
    }
}

<?php

namespace Belt\Spot\Http\Controllers\Api;

use Belt\Core\Http\Controllers\ApiController;
use Belt\Spot\Amenity;
use Belt\Spot\Http\Requests;
use Illuminate\Http\Request;

class AmenitiesController extends ApiController
{

    /**
     * @var Amenity
     */
    public $amenity;

    /**
     * ApiController constructor.
     * @param Amenity $amenity
     */
    public function __construct(Amenity $amenity)
    {
        $this->amenities = $amenity;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize(['view', 'create', 'update', 'delete'], Amenity::class);

        $request = Requests\PaginateAmenities::extend($request);

        $paginator = $this->paginator($this->amenities->query(), $request);

        return response()->json($paginator->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Requests\StoreAmenity $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreAmenity $request)
    {
        $this->authorize('create', Amenity::class);

        $input = $request->all();

        $amenity = $this->amenities->create([
            'parent_id' => $request->get('parent_id'),
            'name' => $request->get('name'),
        ]);

        $this->set($amenity, $input, [
            'is_active',
            'parent_id',
            'name',
            'slug',
            'template',
            'body',
        ]);

        $amenity->save();

        return response()->json($amenity, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Amenity $amenity
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Amenity $amenity)
    {
        $this->authorize(['view', 'create', 'update', 'delete'], $amenity);

        return response()->json($amenity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Requests\UpdateAmenity $request
     * @param  Amenity $amenity
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdateAmenity $request, Amenity $amenity)
    {
        $this->authorize('update', $amenity);

        $input = $request->all();

        $this->set($amenity, $input, [
            'is_active',
            'parent_id',
            'name',
            'slug',
            'template',
            'body',
        ]);

        $amenity->save();

        return response()->json($amenity);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  Amenity $amenity
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amenity $amenity)
    {
        $this->authorize('delete', $amenity);

        $amenity->delete();

        return response()->json(null, 204);
    }
}

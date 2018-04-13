<?php

namespace Belt\Spot\Http\Controllers\Api;

use Belt\Core\Http\Controllers\ApiController;
use Belt\Core\Http\Controllers\Morphable;
use Belt\Spot\Amenity;
use Belt\Spot\Http\Requests;
use Illuminate\Http\Request;

class AmenitySpotsController extends ApiController
{

    use Morphable;

    /**
     * @var Amenity
     */
    public $amenities;

    /**
     * AmenitySpotsController constructor.
     * @param Amenity $amenity
     */
    public function __construct(Amenity $amenity)
    {
        $this->amenities = $amenity;
    }

    /**
     * @param $id
     * @param null $owner
     */
    public function amenity($id, $owner = null)
    {
        if ($owner) {
            $amenity = $owner->amenities->where('id', $id)->first();
        } else {
            $amenity = $this->amenities->query()->where('amenities.id', $id)->first();
        }

        return $amenity ?: $this->abort(404);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param string $owner_type
     * @param integer $owner_id
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $owner_type, $owner_id)
    {
        $owner = $this->morphable($owner_type, $owner_id);

        $this->authorize(['view', 'create', 'update', 'delete'], $owner);

        return response()->json($owner->amenities->toArray());

//        $request = Requests\PaginateAmenitySpots::extend($request);
//        $request->merge([
//            'owner_id' => $owner->id,
//            'owner_type' => $owner->getMorphClass()
//        ]);
//        $paginator = $this->paginator($this->amenities->query(), $request);
//        return response()->json($paginator->toArray());
    }

    /**
     * Store a newly created resource in spot.
     *
     * @param Requests\StoreAmenitySpot $request
     * @param string $owner_type
     * @param integer $owner_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Requests\StoreAmenitySpot $request, $owner_type, $owner_id)
    {
        $owner = $this->morphable($owner_type, $owner_id);

        $this->authorize('update', $owner);

        $id = $request->get('id');

        $this->amenity($id);

        $owner->amenities()->syncWithoutDetaching([$id => ['value' => $request->get('value')]]);

        $amenity = $this->amenity($id, $owner);

        return response()->json($amenity, 201);
    }

    /**
     * Store a newly created resource in spot.
     *
     * @param Requests\UpdateAmenitySpot $request
     * @param string $owner_type
     * @param integer $owner_id
     * @param integer $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Requests\UpdateAmenitySpot $request, $owner_type, $owner_id, $id)
    {
        $request->merge(['id' => $id]);

        $request = new Requests\StoreAmenitySpot($request->all());

        return $this->store($request, $owner_type, $owner_id);
    }

    /**
     * Display the specified resource.
     *
     * @param string $owner_type
     * @param integer $owner_id
     * @param integer $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($owner_type, $owner_id, $id)
    {
        $owner = $this->morphable($owner_type, $owner_id);

        $this->authorize(['view', 'create', 'update', 'delete'], $owner);

        $this->amenity($id, $owner);

        $amenity = $owner->amenities->where('id', $id)->first();

        return response()->json($amenity);
    }

    /**
     * Remove the specified resource from spot.
     *
     * @param string $owner_type
     * @param integer $owner_id
     * @param integer $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($owner_type, $owner_id, $id)
    {
        $owner = $this->morphable($owner_type, $owner_id);

        $this->authorize('update', $owner);

        $this->amenity($id, $owner);

        $owner->amenities()->detach($id);

        return response()->json(null, 204);
    }
}

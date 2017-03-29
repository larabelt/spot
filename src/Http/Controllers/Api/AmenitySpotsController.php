<?php

namespace Belt\Spot\Http\Controllers\Api;

use Belt\Core\Http\Controllers\ApiController;
use Belt\Core\Http\Controllers\Behaviors\Positionable;
use Belt\Spot\Amenity;
use Belt\Spot\Http\Requests;
use Belt\Core\Helpers\MorphHelper;

class AmenitySpotsController extends ApiController
{

    use Positionable;

    /**
     * @var Amenity
     */
    public $amenities;

    /**
     * @var MorphHelper
     */
    public $morphHelper;

    public function __construct(Amenity $amenity, MorphHelper $morphHelper)
    {
        $this->amenities = $amenity;
        $this->morphHelper = $morphHelper;
    }

    public function amenity($id, $owner = null)
    {
        $qb = $this->amenities->query();

        if ($owner) {
            $qb->amenitied($owner->getMorphClass(), $owner->id);
        }

        $amenity = $qb->where('amenities.id', $id)->first();

        return $amenity ?: $this->abort(404);
    }

    public function owner($owner_type, $owner_id)
    {
        $owner = $this->morphHelper->morph($owner_type, $owner_id);

        return $owner ?: $this->abort(404);
    }

    /**
     * Display a listing of the resource.
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function index(Requests\PaginateAmenitySpots $request, $owner_type, $owner_id)
    {

        $request->reCapture();

        $owner = $this->owner($owner_type, $owner_id);

        $this->authorize('view', $owner);

        $request->merge([
            'owner_id' => $owner->id,
            'owner_type' => $owner->getMorphClass()
        ]);

        $paginator = $this->paginator($this->amenities->query(), $request);

        return response()->json($paginator->toArray());
    }

    /**
     * Store a newly created resource in glue.
     *
     * @param  Requests\AttachAmenity $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\AttachAmenity $request, $owner_type, $owner_id)
    {
        $owner = $this->owner($owner_type, $owner_id);

        $this->authorize('update', $owner);

        $id = $request->get('id');

        $amenity = $this->amenity($id);

        if ($owner->amenities->contains($id)) {
            $this->abort(422, ['id' => ['amenity already attached']]);
        }

        $owner->amenities()->attach($id);

        return response()->json($amenity, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($owner_type, $owner_id, $id)
    {
        $owner = $this->owner($owner_type, $owner_id);

        $this->authorize('view', $owner);

        $amenity = $this->amenity($id, $owner);

        return response()->json($amenity);
    }

    /**
     * Remove the specified resource from glue.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($owner_type, $owner_id, $id)
    {
        $owner = $this->owner($owner_type, $owner_id);

        $this->authorize('update', $owner);

        $this->amenity($id, $owner);

        $owner->amenities()->detach($id);

        return response()->json(null, 204);
    }
}

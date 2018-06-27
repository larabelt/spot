<?php

namespace Belt\Spot\Http\Controllers\Api;

use Belt\Core\Http\Controllers\ApiController;
use Belt\Core\Http\Controllers\Morphable;
use Belt\Spot\Location;
use Belt\Spot\Behaviors\LocatableInterface;
use Belt\Spot\Http\Requests;
use Belt\Core\Helpers\MorphHelper;
use Belt\Spot\Behaviors\HasGeoCoder;
use Illuminate\Http\Request;

class LocationsController extends ApiController
{
    use HasGeoCoder, Morphable;

    /**
     * @var Location
     */
    public $location;

    public function __construct(Location $location, MorphHelper $morphHelper)
    {
        $this->location = $location;
    }

    /**
     * @param LocatableInterface $owner
     * @param Location $location
     */
    public function contains(LocatableInterface $owner, Location $location)
    {
        if (!$owner->locations->contains($location->id)) {
            $this->abort(404, 'item does not have this location');
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
    public function index(Request $request, $locatable_type, $locatable_id)
    {

        $request = Requests\PaginateLocations::extend($request);

        $owner = $this->morphable($locatable_type, $locatable_id);

        $this->authorize(['view', 'create', 'update', 'delete'], $owner);

        $request->merge([
            'locatable_id' => $owner->id,
            'locatable_type' => $owner->getMorphClass()
        ]);

        $paginator = $this->paginator($this->location->query(), $request);

        return response()->json($paginator->toArray());
    }

    /**
     * Store a newly created resource in spot.
     *
     * @param Requests\StoreLocation $request
     * @param string $locatable_type
     * @param string $locatable_id
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreLocation $request, $locatable_type, $locatable_id)
    {
        $owner = $this->morphable($locatable_type, $locatable_id);

        $this->authorize('update', $owner);

        $input = $request->all();

        if ($_location = array_get($input, '_location')) {
            $input = $this->mergeGeocode($input, $this->geocode($_location)->location(), '_all');
        }

        $location = $this->location->create([
            'locatable_id' => $locatable_id,
            'locatable_type' => $locatable_type,
        ]);

        $this->set($location, $input, [
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

        $location->save();

        return response()->json($location, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Location $location
     *
     * @return \Illuminate\Http\Response
     */
    public function show($locatable_type, $locatable_id, Location $location)
    {
        $owner = $this->morphable($locatable_type, $locatable_id);

        $this->authorize(['view', 'create', 'update', 'delete'], $owner);

        $this->contains($owner, $location);

        return response()->json($location);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Requests\UpdateLocation $request
     * @param string $locatable_type
     * @param string $locatable_id
     * @param Location $location
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdateLocation $request, $locatable_type, $locatable_id, Location $location)
    {
        $owner = $this->morphable($locatable_type, $locatable_id);

        $this->authorize('update', $owner);

        $this->contains($owner, $location);

        $input = $request->all();

        if ($geocode = array_get($input, '_geocode', [])) {
            $str = $location->full(',', false);
            $include = $geocode == '_all' ? '_all' : explode(',', $geocode);
            $input = $this->mergeGeocode($input, $this->geocode($str)->location(), $include);
        }

        $this->set($location, $input, [
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

        $location->save();

        return response()->json($location);
    }

    /**
     * Remove the specified resource from spot.
     *
     * @param Location $location
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($locatable_type, $locatable_id, Location $location)
    {
        $owner = $this->morphable($locatable_type, $locatable_id);

        $this->authorize('update', $owner);

        $this->contains($owner, $location);

        $location->delete();

        return response()->json(null, 204);
    }
}

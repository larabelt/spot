<?php

namespace Belt\Spot\Http\Controllers\Api;

use Belt\Core\Http\Controllers\ApiController;
use Belt\Spot\Itinerary;
use Belt\Spot\Http\Requests;

/**
 * Class ItinerariesController
 * @package Belt\Spot\Http\Controllers\Api
 */
class ItinerariesController extends ApiController
{

    /**
     * @var Itinerary
     */
    public $itineraries;

    /**
     * ApiController constructor.
     * @param Itinerary $itinerary
     */
    public function __construct(Itinerary $itinerary)
    {
        $this->itineraries = $itinerary;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function index(Requests\PaginateItineraries $request)
    {
        $this->authorize('index', Itinerary::class);

        $paginator = $this->paginator($this->itineraries->query(), $request->reCapture());

        return response()->json($paginator->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Requests\StoreItinerary $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreItinerary $request)
    {
        $this->authorize('create', Itinerary::class);

        if ($source = $request->get('source')) {
            return response()->json($this->itineraries->copy($source), 201);
        }

        $input = $request->all();

        $itinerary = $this->itineraries->create([
            'name' => $input['name'],
        ]);

        $this->set($itinerary, $input, [
            'template',
            'slug',
            'body',
            'heading',
            'meta_title',
            'meta_description',
            'meta_keywords',
        ]);

        $itinerary->save();

        return response()->json($itinerary, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Itinerary $itinerary
     *
     * @return \Illuminate\Http\Response
     */
    public function show($itinerary)
    {
        $this->authorize('view', $itinerary);

        return response()->json($itinerary);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Requests\UpdateItinerary $request
     * @param  Itinerary $itinerary
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdateItinerary $request, $itinerary)
    {
        $this->authorize('update', $itinerary);

        $input = $request->all();

        $this->set($itinerary, $input, [
            'template',
            'slug',
            'name',
            'body',
            'heading',
            'meta_title',
            'meta_description',
            'meta_keywords',
        ]);

        $itinerary->save();

        return response()->json($itinerary);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  Itinerary $itinerary
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($itinerary)
    {
        $this->authorize('delete', $itinerary);

        $itinerary->delete();

        return response()->json(null, 204);
    }
}

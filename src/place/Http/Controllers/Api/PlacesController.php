<?php

namespace Ohio\Spot\Place\Http\Controllers\Api;

use Ohio\Core\Base\Http\Controllers\ApiController;
use Ohio\Spot\Place\Place;
use Ohio\Spot\Place\Http\Requests;

class PlacesController extends ApiController
{

    /**
     * @var Place
     */
    public $places;

    /**
     * ApiController constructor.
     * @param Place $place
     */
    public function __construct(Place $place)
    {
        $this->places = $place;
    }

    public function get($id)
    {
        return $this->places->find($id) ?: $this->abort(404);
    }

    /**
     * Display a listing of the resource.
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function index(Requests\PaginatePlaces $request)
    {
        $paginator = $this->paginator($this->places->query(), $request->reCapture());

        return response()->json($paginator->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Requests\StorePlace $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StorePlace $request)
    {

        $input = $request->all();

        $place = $this->places->create([
            'name' => $input['name'],
        ]);

        $this->set($place, $input, [
            'slug',
            'body',
        ]);

        $place->save();

        return response()->json($place);
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
        $place = $this->get($id);

        return response()->json($place);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Requests\UpdatePlace $request
     * @param  string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdatePlace $request, $id)
    {
        $place = $this->get($id);

        $input = $request->all();

        $this->set($place, $input, [
            'name',
            'slug',
            'body',
        ]);

        $place->save();

        return response()->json($place);
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
        $place = $this->get($id);

        $place->delete();

        return response()->json(null, 204);
    }
}

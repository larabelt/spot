<?php

namespace Ohio\Spot\Http\Controllers\Api;

use Ohio\Core\Http\Controllers\ApiController;
use Ohio\Spot\Http\Requests;
use Ohio\Spot\Place;

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

        $this->authorize('index', Place::class);

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
        $this->authorize('create', Place::class);

        $input = $request->all();

        $place = $this->places->create([
            'name' => $input['name'],
        ]);

        $this->set($place, $input, [
            'team_id',
            'is_active',
            'is_searchable',
            'status',
            'slug',
            'intro',
            'body',
            'hours',
            'url',
            'email',
            'phone',
            'meta_title',
            'meta_description',
            'meta_keywords',
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

        $this->authorize('view', $place);

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

        $this->authorize('update', $place);

        $input = $request->all();

        $this->set($place, $input, [
            'team_id',
            'is_active',
            'is_searchable',
            'status',
            'slug',
            'intro',
            'body',
            'hours',
            'url',
            'email',
            'phone',
            'meta_title',
            'meta_description',
            'meta_keywords',
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

        $this->authorize('delete', $place);

        $place->delete();

        return response()->json(null, 204);
    }
}

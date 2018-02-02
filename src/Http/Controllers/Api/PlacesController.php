<?php

namespace Belt\Spot\Http\Controllers\Api;

use Belt;
use Belt\Core\Http\Controllers\ApiController;
use Belt\Spot\Http\Requests;
use Belt\Spot\Place;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {

        $this->authorize('view', Place::class);

        $request = Requests\PaginatePlaces::extend($request);

        $paginator = $this->paginator($this->places->query(), $request);

        foreach ($paginator->paginator->items() as $item) {
            $item->address;
            $item->addresses;
            $item->amenities;
            $item->attachments;
            $item->categories;
            $item->tags;
            $item->params;
        }

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

        if ($source = $request->get('source')) {
            return response()->json($this->places->copy($source), 201);
        }

        $input = $request->all();

        $place = $this->places->create([
            'name' => $input['name'],
        ]);

        $this->set($place, $input, [
            'team_id',
            'attachment_id',
            'template',
            'is_active',
            'is_searchable',
            'priority',
            'status',
            'slug',
            'intro',
            'body',
            'hours',
            'url',
            'email',
            'phone',
            'phone_tollfree',
            'meta_title',
            'meta_description',
            'meta_keywords',
            'starts_at',
            'ends_at',
        ]);

        $place->save();

        event(new Belt\Spot\Events\PlaceCreated($place));

        return response()->json($place, 201);
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

        $place->address;
        $place->addresses;
        $place->amenities;
        $place->attachments;
        $place->categories;
        $place->tags;
        $place->params;

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
            'attachment_id',
            'template',
            'is_active',
            'is_searchable',
            'priority',
            'status',
            'name',
            'slug',
            'intro',
            'body',
            'hours',
            'url',
            'email',
            'phone',
            'phone_tollfree',
            'meta_title',
            'meta_description',
            'meta_keywords',
            'starts_at',
            'ends_at',
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

<?php

namespace Belt\Spot\Http\Controllers\Api;

use Belt\Core\Http\Controllers\ApiController;
use Belt\Spot\Http\Requests;
use Belt\Spot\Event;

class EventsController extends ApiController
{

    /**
     * @var Event
     */
    public $events;

    /**
     * ApiController constructor.
     * @param Event $event
     */
    public function __construct(Event $event)
    {
        $this->events = $event;
    }

    public function get($id)
    {
        return $this->events->find($id) ?: $this->abort(404);
    }

    /**
     * Display a listing of the resource.
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function index(Requests\PaginateEvents $request)
    {

        $this->authorize('index', Event::class);

        $paginator = $this->paginator($this->events->query(), $request->reCapture());

        return response()->json($paginator->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Requests\StoreEvent $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreEvent $request)
    {
        $this->authorize('create', Event::class);

        if ($source = $request->get('source')) {
            return response()->json($this->events->copy($source), 201);
        }

        $input = $request->all();

        $event = $this->events->create([
            'name' => $input['name'],
        ]);

        $this->set($event, $input, [
            'team_id',
            'attachment_id',
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
            'phone_tollfree',
            'meta_title',
            'meta_description',
            'meta_keywords',
            'starts_at',
            'ends_at',
        ]);

        $event->save();

        return response()->json($event, 201);
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
        $event = $this->get($id);

        $this->authorize('view', $event);

        return response()->json($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Requests\UpdateEvent $request
     * @param  string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdateEvent $request, $id)
    {
        $event = $this->get($id);

        $this->authorize('update', $event);

        $input = $request->all();

        $this->set($event, $input, [
            'team_id',
            'attachment_id',
            'is_active',
            'is_searchable',
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

        $event->save();

        return response()->json($event);
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
        $event = $this->get($id);

        $this->authorize('delete', $event);

        $event->delete();

        return response()->json(null, 204);
    }
}

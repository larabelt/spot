<?php

namespace Belt\Spot\Http\Controllers\Web;

use Belt\Content\Http\Controllers\Compiler;
use Belt\Core\Http\Controllers\BaseController;
use Belt\Spot\Event;

/**
 * Class EventsController
 * @package Belt\Spot\Http\Controllers\Web
 */
class EventsController extends BaseController
{

    use Compiler;

    /**
     * ApiController constructor.
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Display the specified resource.
     *
     * @param  Event $event
     *
     * @return \Illuminate\View\View
     */
    public function show(Event $event)
    {
        $compiled = $this->compile($event);

        $owner = $event;

        $view = $event->getTemplateConfig('extends', 'belt-spot::events.web.show');

        return view($view, compact('owner', 'event', 'compiled'));
    }

}
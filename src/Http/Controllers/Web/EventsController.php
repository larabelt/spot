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
        if (!$event->is_active) {
            try {
                $this->authorize('update', $event);
            } catch (\Exception $e) {
                abort(404);
            }
        }

        $compiled = $this->compile($event);

        $view = $event->getSubtypeConfig('extends', 'belt-spot::events.web.show');

        return view($view, [
            'sectionable' => $event,
            'event' => $event,
            'compiled' => $compiled,
        ]);
    }

}
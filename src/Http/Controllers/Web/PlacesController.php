<?php

namespace Belt\Spot\Http\Controllers\Web;

use Belt\Content\Http\Controllers\Compiler;
use Belt\Core\Http\Controllers\BaseController;
use Belt\Spot\Place;

/**
 * Class PlacesController
 * @package Belt\Spot\Http\Controllers\Web
 */
class PlacesController extends BaseController
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
     * @param  Place $place
     *
     * @return \Illuminate\View\View
     */
    public function show(Place $place)
    {
        if (!$place->is_active) {
            try {
                $this->authorize('update', $place);
            } catch (\Exception $e) {
                abort(404);
            }
        }

        $compiled = $this->compile($place);

        $view = $place->getSubtypeConfig('extends', 'belt-spot::places.web.show');

        return view($view, [
            'sectionable' => $place,
            'place' => $place,
            'compiled' => $compiled,
        ]);
    }

}
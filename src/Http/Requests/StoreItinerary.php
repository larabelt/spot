<?php
namespace Belt\Spot\Http\Requests;

use Belt\Core\Http\Requests\FormRequest;

/**
 * Class StoreItinerary
 * @package Belt\Spot\Http\Requests
 */
class StoreItinerary extends FormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:itineraries,name',
            'body' => 'required',
        ];
    }

}
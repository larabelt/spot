<?php
namespace Belt\Spot\Http\Requests;

use Belt\Core\Http\Requests\FormRequest;

/**
 * Class StoreEvent
 * @package Belt\Spot\Http\Requests
 */
class StoreEvent extends FormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

}
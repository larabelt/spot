<?php
namespace Belt\Spot\Http\Requests;

use Belt\Core\Http\Requests\FormRequest;

/**
 * Class UpdateEvent
 * @package Belt\Spot\Http\Requests
 */
class UpdateEvent extends FormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'sometimes|required',
        ];
    }

}
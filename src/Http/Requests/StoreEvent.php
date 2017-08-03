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
        if ($this->get('source')) {
            return [
                'source' => 'exists:events,id',
            ];
        }

        return [
            'name' => 'required',
            'starts_at' => 'required',
            'ends_at' => 'required|after:starts_at',
        ];
    }

}
<?php
namespace Belt\Spot\Http\Requests;

use Belt\Core\Http\Requests\FormRequest;

/**
 * Class StorePlace
 * @package Belt\Spot\Http\Requests
 */
class StorePlace extends FormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        if ($this->get('source')) {
            return [
                'source' => 'exists:places,id',
            ];
        }

        return [
            'name' => 'required',
        ];
    }

}
<?php
namespace Ohio\Spot\Address\Http\Requests;

use Ohio\Core\Base\Http\Requests\FormRequest;

class StoreAddress extends FormRequest
{

    public function rules()
    {
        return [
            'url' => 'required|unique:addresses|unique_route',
            'addressable_id' => 'required',
            'addressable_type' => 'required',
        ];
    }

}
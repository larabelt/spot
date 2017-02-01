<?php
namespace Ohio\Spot\Http\Requests;

use Ohio\Core\Http\Requests\FormRequest;

class StoreAddress extends FormRequest
{

    public function rules()
    {
        return [
            'addressable_id' => 'required',
            'addressable_type' => 'required',
        ];
    }

}
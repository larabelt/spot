<?php
namespace Belt\Spot\Http\Requests;

use Belt\Core\Http\Requests\FormRequest;

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
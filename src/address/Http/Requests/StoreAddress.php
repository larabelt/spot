<?php
namespace Ohio\Spot\Address\Http\Requests;

use Ohio\Core\Base\Http\Requests\FormRequest;

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
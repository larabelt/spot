<?php
namespace Ohio\Spot\Http\Requests;

use Ohio\Core\Http\Requests\FormRequest;

class UpdateAddress extends FormRequest
{

    public function rules()
    {
        return [
//            'url' => 'sometimes|required',
//            'addressable_id' => 'sometimes|required',
//            'addressable_type' => 'sometimes|required',
        ];
    }

}
<?php
namespace Ohio\Spot\Address\Http\Requests;

use Ohio\Core\Base\Http\Requests\FormRequest;

class UpdateAddress extends FormRequest
{

    public function rules()
    {
        return [
            'url' => 'sometimes|required',
            'addressable_id' => 'sometimes|required',
            'addressable_type' => 'sometimes|required',
        ];
    }

}
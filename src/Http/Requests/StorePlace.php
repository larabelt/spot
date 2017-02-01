<?php
namespace Ohio\Spot\Http\Requests;

use Ohio\Core\Http\Requests\FormRequest;

class StorePlace extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

}
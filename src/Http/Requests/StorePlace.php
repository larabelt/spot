<?php
namespace Belt\Spot\Http\Requests;

use Belt\Core\Http\Requests\FormRequest;

class StorePlace extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

}
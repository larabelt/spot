<?php
namespace Belt\Spot\Http\Requests;

use Belt\Core\Http\Requests\FormRequest;

class StoreLocation extends FormRequest
{

    public function rules()
    {
        return [
            'locatable_id' => 'required',
            'locatable_type' => 'required',
        ];
    }

}
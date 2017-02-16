<?php
namespace Belt\Spot\Http\Requests;

use Belt\Core\Http\Requests\FormRequest;

class UpdatePlace extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'sometimes|required',
        ];
    }

}
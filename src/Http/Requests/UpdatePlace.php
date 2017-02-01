<?php
namespace Ohio\Spot\Http\Requests;

use Ohio\Core\Http\Requests\FormRequest;

class UpdatePlace extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'sometimes|required',
        ];
    }

}
<?php
namespace Ohio\Spot\Place\Http\Requests;

use Ohio\Core\Base\Http\Requests\FormRequest;

class UpdatePlace extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'sometimes|required',
        ];
    }

}
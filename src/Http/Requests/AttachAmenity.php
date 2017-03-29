<?php
namespace Belt\Spot\Http\Requests;

use Belt\Core\Http\Requests\FormRequest;

class AttachAmenity extends FormRequest
{


    /**
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:amenities,id',
        ];
    }

}
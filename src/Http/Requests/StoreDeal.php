<?php
namespace Belt\Spot\Http\Requests;

use Belt\Core\Http\Requests\FormRequest;

/**
 * Class StoreDeal
 * @package Belt\Spot\Http\Requests
 */
class StoreDeal extends FormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        if ($this->get('source')) {
            return [
                'source' => 'exists:deals,id',
            ];
        }

        return [
            'name' => 'required',
        ];
    }

}
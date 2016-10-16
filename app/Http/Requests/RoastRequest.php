<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoastRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'roasted_at'       => ['required', 'date', 'before:tomorrow'],
            'bean_id'          => ['required', 'integer', 'exists:beans,id'],
            'drying_time'      => ['required', 'date_format:H:i:s'],
            'maillard_time'    => ['required', 'date_format:H:i:s'],
            'development_time' => ['required', 'date_format:H:i:s'],
            'drop_temperature' => ['required', 'numeric', 'min:0']
        ];
    }
}

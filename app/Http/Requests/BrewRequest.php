<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ApiRequest;
use Log;

class BrewRequest extends ApiRequest
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

    public function requiredNumericRules($fieldName) {
        $rules = [];

        $array = $this->input($fieldName) ?: [];
        foreach($array as $index => $field) {
            $rules["{$fieldName}.{$index}"] = ['required', 'numeric'];
        }

        return $rules;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'brewed_at'      => ['required', 'date_formats:U,Y-m-d H:i:s', 'before:tomorrow'],
            'roast_id'       => ['sometimes', 'integer', 'exists:roasts,id'],
            'brew_style_id'  => ['required', 'integer', 'exists:brew_styles,id'],
            'fine'           => ['sometimes', 'integer', 'min:1', 'max:10'],
            'finer'          => [
                'sometimes',
                'alpha',
                'size:1',
                'regex:/[ABCDEFGHIJKLMNOPQRSTUVW]/'
            ],
            'times'          => ['sometimes', 'array'],
            'temperatures'   => ['sometimes', 'array'],
            'pressures'      => ['sometimes', 'array'],
            'extra_fields'   => ['sometimes', 'string']
        ];

        return array_merge(
            $rules,
            $this->requiredNumericRules('times'),
            $this->requiredNumericRules('temperatures'),
            $this->requiredNumericRules('pressures')
        );
    }

    public function sanitize() {
        $input = $this->all();
        $input['finer'] = strtoupper($input['finer']);

        $this->replace($input);

        return $this->all();

    }
}

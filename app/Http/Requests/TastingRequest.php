<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TastingRequest extends Request
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
        $rules = [
            'tasted_at'     => ['required', 'date', 'before:tomorrow'],
            'user_id'       => ['required', 'integer', 'exists:users,id'],
            'brew_id'       => ['required', 'integer', 'exists:brews,id'],
            'overall_score' => ['required', 'integer', 'min:0', 'max:10'],
            'dry_fragrance' => ['required', 'integer', 'min:0', 'max:10'],
            'wet_aroma'     => ['required', 'integer', 'min:0', 'max:10'],
            'brightness'    => ['required', 'integer', 'min:0', 'max:10'],
            'flavor'        => ['required', 'integer', 'min:0', 'max:10'],
            'body'          => ['required', 'integer', 'min:0', 'max:10'],
            'finish'        => ['required', 'integer', 'min:0', 'max:10'],
            'sweetness'     => ['required', 'integer', 'min:0', 'max:10'],
            'clean_cup'     => ['required', 'integer', 'min:0', 'max:10'],
            'complexity'    => ['required', 'integer', 'min:0', 'max:10'],
            'uniformity'    => ['required', 'integer', 'min:0', 'max:10'],
            'flavors'       => ['sometimes', 'array']
        ];
        return array_merge($rules, $this->flavorRules());
    }

	public function flavorRules()
	{
		$rules = [];

		$flavors = $this->input('flavors') ?: [];
		foreach($flavors as $index => $flavor) {
			$rules["flavors.$index"] = ['required', 'string', 'max:255'];
		}


		return $rules;
	}
}

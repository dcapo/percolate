<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use ApiResponse;

class ApiRequest extends Request {

    /**
     * Override the base implementation from FormRequest, which causes a redirect.
     * For API requests, we just want to respond with the errors JSON.
     */
    public function response(array $errors)
    {
        if ($this->wantsJson()) {
            return ApiResponse::validationFailedWithErrors($errors);
        }
    }

}

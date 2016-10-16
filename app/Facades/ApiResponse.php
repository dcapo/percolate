<?php namespace App\Facades;

use \Illuminate\Support\Facades\Response;
use \Symfony\Component\HttpFoundation\Response as ResponseConstants;

class ApiResponse extends Response {

    public static function make($data,
        $error,
        $status = ResponseConstants::HTTP_OK,
        $headers = [])
    {
        $content = [
            'data' => $data,
            'error' => $error
        ];
        return static::json($content, $status, $headers);
    }

    public static function error($message = '',
        $statusCode = ResponseConstants::HTTP_INTERNAL_SERVER_ERROR,
        $headers = [])
    {
        if (!$message) {
            $message = ResponseConstants::$statusTexts[$statusCode] ?:
                       ResponseConstants::$statusTexts[ResponseConstants::HTTP_INTERNAL_SERVER_ERROR];
        }

        return static::make(null, [
            'message' => $message,
            'code' => $statusCode
        ], $statusCode, $headers);
    }

    public static function data($data)
    {
        return static::make($data, null, ResponseConstants::HTTP_OK);
    }

    public static function entityCreated($data)
    {
        return static::make($data, null, ResponseConstants::HTTP_CREATED);
    }

    public static function entityDeleted()
    {
        return static::make(null, null, ResponseConstants::HTTP_ACCEPTED);
    }

    public static function ok()
    {
        return static::make(null, null);
    }

    public static function validationFailed($message = '')
    {
        return static::error($message, ResponseConstants::HTTP_UNPROCESSABLE_ENTITY);
    }

    public static function validationFailedWithErrors($errors = []) {
        $validationErrorMessage = 'Uh oh!';
        foreach ($errors as $key => $error) {
            foreach($error as $index => $message) {
                $validationErrorMessage .= "\n$message";
            }
        }

        return static::validationFailed($validationErrorMessage);
    }

    public static function notFound($message = '')
    {
        return static::error($message, ResponseConstants::HTTP_NOT_FOUND);
    }

    public static function unauthorized($message = '', $headers = []) {
        return static::error($message, ResponseConstants::HTTP_UNAUTHORIZED, $headers);
    }

    public static function forbidden($message = '', $headers = []) {
        return static::error($message, ResponseConstants::HTTP_FORBIDDEN, $headers);
    }

    public static function redirect($url) {
        return static::json([
            'data' => null,
            'redirect' => $url
        ]);
    }

}


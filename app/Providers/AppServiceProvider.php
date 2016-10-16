<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('date_formats', function($attribute, $value, $formats) {
            foreach($formats as $format) {
                $parsed = date_parse_from_format($format, $value);

                if ($parsed['error_count'] === 0 &&
                    $parsed['warning_count'] === 0) {
                    return true;
                }
            }

            return false;
        }, 'The {field} field must be a valid datetime.');

        Validator::replacer('date_formats',
                            function($message, $attribute, $rule, $parameters) {
            return str_replace('{field}', $attribute, $message);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

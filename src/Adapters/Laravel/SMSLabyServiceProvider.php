<?php

namespace FoxLaby\SMSLaby\Adapters\Laravel;

class SMSLabyServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        // Add functions by helper laravel
        $fileHelper = __DIR__.'/helpers/Helper.php';
        if (file_exists($fileHelper)) {
            require_once($fileHelper);
        }
    }
}
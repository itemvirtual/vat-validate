<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Ecommerce Log Channel
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    |
    */

    'vat-validate' => [
        'driver' => 'daily',
        'path' => storage_path('logs/vat-validate.log'),
        'level' => 'debug',
        'days' => 30,
    ],

];

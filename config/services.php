<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    // 'mailgun' => [
    //     'domain' => env('MAILGUN_DOMAIN', 'https://api.mailgun.net/v3/sandboxe31bb8c7d4b44782a216a3ee62328fc9.mailgun.org'),
    //     'secret' => env('MAILGUN_SECRET', '39b0cfa01c5e1dbeb25d8e3f460a57b0-4de08e90-e2edd9a8'),
    //     'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    // ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
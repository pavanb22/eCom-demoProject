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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '174153526325-16l60mo244pji0gmc5jaiiasvenv9pta.apps.googleusercontent.com',
        'client_secret' => '--k7W0pBTZYhqeMyMpmuxvT_',
        'redirect' => 'http://127.0.0.1:8000/google/callback',
    ], 

    'facebook' => [
        'client_id' => '2910040025882369',
        'client_secret' => '647fba117cb5d6d4737c50ea68fcaa32',
        'redirect' => 'http://localhost:8000/facebook/callback',
    ], 

];

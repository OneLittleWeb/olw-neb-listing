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

    'stripe' => [
        'pub_key' => env('STRIPE_PUB_ID', 'pk_test_51Mt7LPDagRG4n09BNwACeF4RetWbeq1uRmzMNF9KGkESOmJOkP0qQq2FRqNB4CnX63RDN3S1M3xKMVTjymkS2xo100rRQ80d0R'),
        'secret_key' => env('STRIPE_SECRET_KEY_ID', 'sk_test_51Mt7LPDagRG4n09BAN1x59Tue2auRvWTeYPefOdhZ5kexEoEHuWqC2Hm018vISzT7662oi37QUJ39ooEUKCucUYp005p3ZgJda')
    ],

];

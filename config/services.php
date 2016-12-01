<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
    'client_id' => '1758080594445949',
    'client_secret' => '15a9058c164e789e4219dd8473302749',
    'redirect' => 'http://localhost:8000/callback/facebook',
],

    'google' => [
    'client_id' => '516232646328-0baehc2tae1lb6c1jka258h0rmmha3bb.apps.googleusercontent.com',
    'client_secret' => '4qVZR6fmZv2k7IvU0udltz6K',
    'redirect' => 'http://localhost:8000/callback/google',
],
];

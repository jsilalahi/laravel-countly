<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Countly Settings
    |--------------------------------------------------------------------------
    |
    | Countly is disabled by default. You can override the value by setting 
    | enable to true or false instead of null.
    |
    | You can provide an array of URI's that must be ignored (eg. 'admin/*')
    */

    'enabled' => env('COUNTLY_ENABLED', false),
    'except' => [
        'admin/*' // Current not available
    ],

    /*
    |--------------------------------------------------------------------------
    | Countly App Key
    |--------------------------------------------------------------------------
    |
    | The Countly application key. Usually, the key is generated utomatically 
    | when you create a website for tracking on Countly dashboard. To retrieve 
    | your key, go to Management -> Applications and select your app, and you 
    | will see App Key field.
    |
    */

    'app_key' => env('COUNTLY_APP_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | Countly Host
    |--------------------------------------------------------------------------
    |
    | If you are using Countly Enterprise Edition trial servers use 
    | https://try.count.ly, https://us-try.count.ly or https://asia-try.count.ly. 
    | Basically the domain you are accessing your trial dashboard from.
    |
    | If you use Community Edition and Enterprise Edition, use your own domain name 
    | or IP address like https://example.com or https://ipa.ddr.ess (if SSL is setup).
    |
    */

    'host' => env('COUNTLY_HOST', ''),

    /*
    |--------------------------------------------------------------------------
    | Countly Features
    |--------------------------------------------------------------------------
    |
    | Below are Countly features available, which can be enabled and disabled 
    | for each.
    |
    | - track_sessions: Track user sessions
    | - track_pageview: Track page views
    | - track_clicks: Track user clicks
    | - track_scrolls: Track page scrolls
    | - track_errors: Track javascript errors
    | - track_links: Generate events for link clicks
    | - track_forms: Generate events for form submissions
    | - collect_from_forms: Collect user information from forms
    */

    'features' => [
        'track_sessions' => true,
        'track_pageview' => true,
        'track_clicks' => true,
        'track_scrolls' => true,
        'track_errors' => true,
        'track_links' => true,
        'track_forms' => true,
        'collect_from_forms' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Countly Script Source
    |--------------------------------------------------------------------------
    |
    | The Countly script loaded from. There are several place for script to load from
    | - server: Load script based on given host
    | - cdnjs: Load script from cdnjs
    | - jsdeliver: Load script from jsdeliver
    | - custom: Load script custom server. If you are using custom, you must provide
    |           the custom script URL at COUNTLY_SCRIPT_CUSTOM
    */

    'script' => env('COUNTLY_SCRIPT', 'server'),

    'script_src' => [
        'server' => env('COUNTLY_HOST', '') . '/sdk/web/countly.min.js',
        'cdnjs' => 'https://cdnjs.cloudflare.com/ajax/libs/countly-sdk-web/18.8.2/countly.min.js',
        'jsdeliver' => 'https://cdn.jsdelivr.net/countly-sdk-web/latest/countly.min.js',
    ],
];

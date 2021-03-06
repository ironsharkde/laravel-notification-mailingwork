<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mailingwork Username
    |--------------------------------------------------------------------------
    |
    | This will get used to authenticate with your server on
    | connection. You may also set the "password" value below this one.
    |
    */

    'username' => env('MAILINGWORK_USERNAME'),

    /*
    |--------------------------------------------------------------------------
    | Mailingwork Password
    |--------------------------------------------------------------------------
    |
    | This will be given to the server on
    | connection so that the application will be able to send messages.
    |
    */

    'password' => env('MAILINGWORK_PASSWORD'),

    /*
    |--------------------------------------------------------------------------
    | Mailingwork Folder
    |--------------------------------------------------------------------------
    |
    | This will be given to the server on
    | connection so that the application will be able to send messages.
    |
    */

    'folder' => env('MAILINGWORK_FOLDER'),

    /*
    |--------------------------------------------------------------------------
    | API Protocol
    |--------------------------------------------------------------------------
    |
    | Here you chose if https protocol should be used for api comunication.
    |
    */

    'ssl' => env('MAILINGWORK_SSL', true),

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all e-mails sent by your application to be sent from
    | the same address. Here, you may specify a name and address that is
    | used globally for all e-mails that are sent by your application.
    |
    */

    'from' => [
        'address' => env('MAILINGWORK_FROM_ADDRESS', config('mail.from.address')),
        'name' => env('MAILINGWORK_FROM_NAME', config('mail.from.name'))
    ],

];
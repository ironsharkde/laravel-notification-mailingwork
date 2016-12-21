# Mailingwork Notifications Channel for Laravel 5.3 [WIP]

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

This package makes it easy to send notifications using [Mailingwork](link to service) with Laravel 5.3.

This is where your description should go. Add a little code example so build can understand real quick how the package can be used. Try and limit it to a paragraph or two.


## Contents

- [Installation](#installation)
	- [Setting up the Mailingwork service](#setting-up-the-Mailingwork-service)
- [Usage](#usage)
	- [Available Message methods](#available-message-methods)
- [Changelog](#changelog)
- [Testing](#testing)
- [Security](#security)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)


## Installation

Since the package is under development and not published in official laravel-notification-channels repository, you need to define custom repository to install it from current repository.
Add following repository to your `composer.json` file.

```json
"repositories": [
	{
		"type": "vcs",
		"url": "git@github.com:ironsharkde/laravel-notification-mailingwork.git"
	}
],
```

Now you can install the package via composer:

```sh
composer require laravel-notification-channels/mailingwork dev-master
```


You must install the service provider:

```php
// config/app.php
'providers' => [
    ...
    NotificationChannels\Mailingwork\MailingworkServiceProvider::class,
],
```

### Setting up the Mailingwork service

Optionally include a few steps how users can set up the service.

You will need to a mailingworks account in order to use this channel. Place place your credentails and configs inside your `.env` file, create addition `config/mailingwork.php` file:

```php
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
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all e-mails sent by your application to be sent from
    | the same address. Here, you may specify a name and address that is
    | used globally for all e-mails that are sent by your application.
    |
    */

    'from' => [
        'address' => env('MAILINGWORK_FROM_ADDRESS'),
        'name' => env('MAILINGWORK_FROM_NAME')
    ],

];
```

## Usage

Some code examples, make it clear how to use the package

### Available methods

A list of all available options

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Security

If you discover any security related issues, please email pauli@ironshark.de instead of using the issue tracker.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Anton Pauli](https://github.com/TUNER88)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

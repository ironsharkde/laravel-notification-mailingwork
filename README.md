# Mailingwork Notifications Channel for Laravel 5.3 [WIP]

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

This package makes it easy to send notifications using [Mailingwork](https://mailingwork.de) with Laravel 5.3.

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

You will need a mailingworks account in order to use this channel.
Place your credentails and configs inside your `.env` file, 
or create custom `config/mailingwork.php` file based on [this file](resources/config/mailingwork.php):

```sh
MAILINGWORK_USERNAME=username
MAILINGWORK_PASSWORD=pass
MAILINGWORK_FROM_ADDRESS=postmaster@example.com
MAILINGWORK_FROM_NAME=Postmaster
```

## Usage

You can now use the channel in your `via()` method inside the Notification class.

```php
use Illuminate\Notifications\Notification;
use NotificationChannels\Mailingwork\MailingworkChannel;
use NotificationChannels\Mailingwork\MailingworkMessage;

class InvoicePaid extends Notification
{
    public function via($notifiable)
    {
        return [MailingworkChannel::class];
    }

    public function toMailingwork($notifiable)
    {
        return (new MailingworkMessage)
            ->to($notifiable->email)
            ->line('The introduction to the notification.')
            ->action('Notification Action', 'https://laravel.com')
            ->line('Thank you for using our application!');
    }
}
```

### Available methods

- `to($address)`: (string) Recipient's email address.
- `subject($subject)`: (string) Set the subject of the notification.
- `greeting($greeting)`: (string) Set the greeting of the notification.
- `line($address)`: (string) Add a line of text to the notification.
- `action($text, $url)`: (string) Configure the "call to action" button.
- `level($level)`: (string) Set the "level" of the notification (success, error, etc.).

Set the "level" of the notification (success, error, etc.).

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

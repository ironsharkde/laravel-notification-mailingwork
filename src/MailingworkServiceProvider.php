<?php

namespace NotificationChannels\Mailingwork;

use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\ServiceProvider;

class MailingworkServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // load configs
        $this->mergeConfigFrom(__DIR__ . '/../resources/config/mailingwork.php', 'mailingwork');

        $this->app->when(MailingworkChannel::class)
            ->needs(Mailingwork::class)
            ->give(function () {
                return new Mailingwork(config('mailingwork'), new HttpClient());
            });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}

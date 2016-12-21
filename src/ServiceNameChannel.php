<?php

namespace NotificationChannels\Mailingwork;

use NotificationChannels\Mailingwork\Exceptions\CouldNotSendNotification;
use NotificationChannels\Mailingwork\Events\MessageWasSent;
use NotificationChannels\Mailingwork\Events\SendingMessage;
use Illuminate\Notifications\Notification;

class MailingworkChannel
{
    public function __construct()
    {
        // Initialisation code here
    }

    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     *
     * @throws \NotificationChannels\Mailingwork\Exceptions\CouldNotSendNotification
     */
    public function send($notifiable, Notification $notification)
    {
        //$response = [a call to the api of your notification send]

//        if ($response->error) { // replace this by the code need to check for errors
//            throw CouldNotSendNotification::serviceRespondedWithAnError($response);
//        }
    }
}

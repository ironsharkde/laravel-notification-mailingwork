<?php

namespace NotificationChannels\Mailingwork;

use Illuminate\Notifications\Notification;
use NotificationChannels\Mailingwork\Exceptions\CouldNotSendNotification;
use NotificationChannels\Mailingwork\Events\MessageWasSent;
use NotificationChannels\Mailingwork\Events\SendingMessage;

class MailingworkChannel
{
    /**
     * @var Mailingwork
     */
    protected $mailingwork;

    /**
     * Channel constructor.
     *
     * @param Mailingwork $mailingwork
     */
    public function __construct(Mailingwork $mailingwork)
    {
        $this->mailingwork = $mailingwork;
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
        $message = $notification->toMailingwork($notifiable);
        $this->mailingwork->sendMessage($message);
    }
}

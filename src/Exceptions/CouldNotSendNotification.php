<?php

namespace NotificationChannels\Mailingwork\Exceptions;

use GuzzleHttp\Exception\ClientException;

class CouldNotSendNotification extends \Exception
{
    /**
     * Thrown when there's a bad request and an error is responded.
     *
     * @param ClientException $exception
     *
     * @return static
     */
    public static function mailingworkRespondedWithAnError(ClientException $exception)
    {
        $statusCode = $exception->getResponse()->getStatusCode();

        $description = 'no description given';

        if ($result = json_decode($exception->getResponse()->getBody())) {
            $description = $result->description ?: $description;
        }

        return new static("Mailingwork responded with an error `{$statusCode} - {$description}`");
    }

    /**
     * Thrown when there's a API returns an error message.
     *
     * @param string $message
     * @return static
     */
    public static function mailingworkRespondedWithAnMessage(string $message){
        return new static($message);
    }

    /**
     * Thrown when credentials are missing.
     *
     * @param string $message
     *
     * @return static
     */
    public static function credentialsNotProvided($message)
    {
        return new static($message);
    }

    /**
     * Thrown when we're unable to communicate with Mailingwork.
     *
     * @return static
     */
    public static function couldNotCommunicateWithMailingwork()
    {
        return new static('The communication with Mailingwork failed.');
    }
}

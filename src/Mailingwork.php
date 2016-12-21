<?php

namespace NotificationChannels\Mailingwork;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException;
use NotificationChannels\Mailingwork\Exceptions\CouldNotSendNotification;

class Mailingwork
{
    /** @var HttpClient HTTP Client */
    protected $http;

    /**
     * Mailingwork username
     * @var mixed|null
     */
    protected $username = null;

    /**
     * Mailingwork password
     * @var mixed|null
     */
    protected $password = null;

    /**
     * Sender name
     * @var null
     */
    protected $fromName = null;

    /**
     * Sender address
     * @var null
     */
    protected $fromAddress = null;

    /**
     * Mailingwork API baseurl
     * @var string
     */
    protected $apiBaseUrl = "https://login.mailingwork.de/webservice/webservice/json/";


    /**
     * Mailingwork constructor.
     * @param array $config
     * @param HttpClient|null $httpClient
     */
    public function __construct(array $config, HttpClient $httpClient = null)
    {
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->fromName = $config['from']['name'];
        $this->fromAddress = $config['from']['address'];

        $this->http = $httpClient;
    }

    /**
     * Get HttpClient.
     *
     * @return HttpClient
     */
    protected function httpClient()
    {
        return $this->http ?: $this->http = new HttpClient();
    }


    public function sendMessage(MailingworkMessage $message)
    {
        $this->createEmail($message);
        dd('x');
        return $this->sendRequest('sendMessage', $params);
    }

    private function createEmail(MailingworkMessage $message){
        $m = view($message->view[0], $message->viewData)->render());
        dump($m);

        $response = $this->sendRequest('createemail', [
            'subject' => $message->subject,
            'senderName' => $this->fromName,
            'senderEmail' => $this->fromAddress,
            'html' => $message->to
        ]);
        dd($response);
    }

    private function activateEmail(){

    }

    private function sendEmail(){

    }

    /**
     * Send an API request and return response.
     *
     * @param $endpoint
     * @param $params
     *
     * @throws CouldNotSendNotification
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    protected function sendRequest($endpoint, $params)
    {
        if (!$this->username || !$this->password) {
            throw CouldNotSendNotification::credentialsNotProvided('You must provide mailingwork credentials to make any API requests.');
        }

        $endPointUrl = $this->apiBaseUrl.$endpoint;

        try {
            return $this->httpClient()->post($endPointUrl, [
                'form_params' => $params,
            ]);
        } catch (ClientException $exception) {
            throw CouldNotSendNotification::mailingworkRespondedWithAnError($exception);
        } catch (\Exception $exception) {
            throw CouldNotSendNotification::couldNotCommunicateWithTelegram();
        }
    }
}
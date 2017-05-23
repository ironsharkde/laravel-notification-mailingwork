<?php

namespace NotificationChannels\Mailingwork;

use ReflectionClass;
use ReflectionProperty;
use Illuminate\Support\Arr;
use Illuminate\Notifications\Messages\MailMessage;

class MailingworkMessage extends MailMessage
{
    /**
     * Mailingwork API - username, system credentils would be ignored
     *
     * @var null
     */
    public $username = null;

    /**
     * Mailingwork API - password, system credentils would be ignored
     *
     * @var null
     */
    public $password = null;

    /**
     * The view for the message.
     *
     * @var string
     */
    public $view = 'notifications::email';

    /**
     * Render message, pass all public propperties to the view template
     *
     * @return string
     */
    public function render(){
        return view($this->view, $this->buildViewData())->render();
    }

    /**
     * Build the view data for the message.
     *
     * @return array
     */
    protected function buildViewData()
    {
        $data = $this->viewData;

        foreach ((new ReflectionClass($this))->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
            $data[$property->getName()] = $property->getValue($this);
        }

        return $data;
    }
}

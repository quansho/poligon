<?php

namespace App\DesignPatterns\Foundamental\Delegation\Messengers;

use  App\DesignPatterns\Foundamental\Delegation\Interfaces\MessangerInterface;

abstract class AbstractMessenger implements MessangerInterface
{

    private $sender;

    private $recipient;

    private $message;

    public function send(): bool
    {
       return true;
    }

    public function setMessage($value): MessangerInterface
    {
        $this->message = $value;
        return $this;
    }

    public function setRecipient($value): MessangerInterface
    {
        $this->recipient = $value;
        return $this;
    }

    public function setSender($value): MessangerInterface
    {
        $this->sender = $value;
        return $this;
    }
}

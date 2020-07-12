<?php

namespace App\DessignPatterns\Delegation\Messengers;

use  App\DessignPatterns\Delegation\Interfaces\MessangerInterface;

abstract class AbstractMessanger implements MessangerInterface
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

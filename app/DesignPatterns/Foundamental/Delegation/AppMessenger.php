<?php

namespace App\DessignPatterns\Delegation;

use App\DessignPatterns\Delegation\Interfaces\MessangerInterface;
use App\DessignPatterns\Delegation\Messengers\EmailMessenger;
use App\DessignPatterns\Delegation\Messengers\SmsMessenger;
use stdClass;

class AppMessenger implements MessangerInterface
{
    private $messenger;

    static function getDescription()
    {
        $descObj = new stdClass();

        $description =
            "Делегирование — основной шаблон проектирования,
        в котором объект внешне выражает некоторое поведение,
        но в реальности передаёт ответственность за выполнение
        этого поведения связанному объекту.
        ";

        $descObj->description = $description;
        $descObj->url = 'https://en.wikipedia.org/wiki/Delegation_pattern';

        return $descObj;
    }

    public function __construct()
    {
        $this->toEmail();
    }

    public function toEmail()
    {
        $this->messenger = new EmailMessenger();
        return $this;
    }

    public function toSms()
    {
        $this->messenger = new SmsMessenger();
        return $this;
    }

    public function setSender($value): MessangerInterface
    {
        $this->messenger->setSender($value);

        return $this->messenger;
    }

    public function setRecipient($value): MessangerInterface
    {
        $this->messenger->setRecipient($value);

        return $this->messenger;

    }

    public function setMessage($value): MessangerInterface
    {
        $this->messenger->setMessage($value);
        return $this->messenger;

    }

    public function send(): bool
    {
        return $this->messenger->send();
    }


}

<?php


namespace  App\DessignPatterns\Delegation\Messengers;


class SmsMessenger extends AbstractMessanger
{
    public function send(): bool
    {
        \Debugbar::info('Sent by '. __METHOD__);
        return parent::send();
    }
}

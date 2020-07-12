<?php


namespace  App\DessignPatterns\Delegation\Messengers;


class EmailMessenger extends AbstractMessanger
{

    public function send(): bool
    {
        \Debugbar::info('Sent by '. __METHOD__);
        return parent::send();
    }

}

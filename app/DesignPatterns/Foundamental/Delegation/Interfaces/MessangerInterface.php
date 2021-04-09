<?php

namespace  App\DesignPatterns\Foundamental\Delegation\Interfaces;


interface MessangerInterface
{

    /**
     * @param $value
     * @return MessangerInterface
     */
    public function setSender($value) : MessangerInterface;

    /**
     * @param $value
     * @return MessangerInterface
     */
    public function setRecipient($value) : MessangerInterface;

    /**
     * @param $value
     * @return MessangerInterface
     */
    public function setMessage($value) : MessangerInterface;

    /**
     * @return bool
     */
    public function send() : bool;


}

<?php

namespace App\DesignPatterns\Foundamental\EventChannel\Classes;

use App\DesignPatterns\Foundamental\EventChannel\Interfaces\SubscriberInterface;

/**
 * Class Subscriber
 * @package App\DesignPatterns\Foundamental\EventChannel\Classes
 */
class Subscriber implements SubscriberInterface
{
    /**
     * @var string $name
     */
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param $data
     * @return mixed|void
     */
    public function notify($data)
    {
        $msg = "{$this->getName()} оповещен(-а) данными [{$data}]";
        \Debugbar::info($msg);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

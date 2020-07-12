<?php


namespace App\DesignPatterns\Foundamental\EventChannel\Classes;

use App\DesignPatterns\Foundamental\EventChannel\Interfaces\EventChannelInterface;
use App\DesignPatterns\Foundamental\EventChannel\Interfaces\PublisherInterface;

class Publisher implements PublisherInterface
{
    /**
     * @var
     */
    private $topic;

    /**
     * @var EventChannelInterface
     */
    private $eventChannel;

    /**
     * Publisher constructor.
     * @param $topic
     * @param EventChannelInterface $eventChannel
     */
    public function __construct($topic, EventChannelInterface $eventChannel)
    {
        $this->topic = $topic;
        $this->eventChannel = $eventChannel;
    }

    /**
     * @param $data
     * @return mixed|void
     */
    public function publish($data)
    {
        $this->eventChannel->publish($this->topic, $data);
    }

}

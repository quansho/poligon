<?php


namespace App\DesignPatterns\Foundamental\EventChannel\Classes;


use App\DesignPatterns\Foundamental\EventChannel\Interfaces\EventChannelInterface;
use App\DesignPatterns\Foundamental\EventChannel\Interfaces\SubscriberInterface;

class EventChannel implements EventChannelInterface
{
    /**
     * @var array
     */
    private $topics = [];

    /**
     * @param string $topic
     * @param SubscriberInterface $subscriber
     */
    public function subscribe($topic, SubscriberInterface $subscriber)
    {
        $this->topics[$topic][] = $subscriber;

        $msg = "{$subscriber->getName()} подпсан на [{$topic}]";
        \Debugbar::info($msg);
    }

    public function publish($topic, $data)
    {
        if(empty($this->topics[$topic])){
            return;
        }

        foreach ($this->topics[$topic] as $subscriber){
            /** @var SubscriberInterface $subscriber */
            $subscriber->notify($data);
        }
    }

}

<?php


namespace App\DesignPatterns\Foundamental\EventChannel\Interfaces;

/**
 * Interface SubscriberInterface
 * @package App\DesignPatterns\Foundamental\EventChannel\Interfaces
 */
interface SubscriberInterface
{
    /**
     * Уведомления подписчика
     *
     * @param $data
     * @return mixed
     */
    public function notify($data);

    /**
     * @return string $name
     */
    public function getName();
}

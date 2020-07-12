<?php


namespace App\DesignPatterns\Foundamental\EventChannel\Interfaces;

/**
 * Interface PublisherInterface
 * @package App\DesignPatterns\Foundamental\EventChannel\Interfaces
 */
interface PublisherInterface
{
    /**
     * Уведомления подписчиков
     *
     * @param $data
     * @return mixed
     */
    public function publish($data);
}

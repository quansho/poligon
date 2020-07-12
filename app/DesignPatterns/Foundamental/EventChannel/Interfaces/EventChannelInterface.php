<?php


namespace App\DesignPatterns\Foundamental\EventChannel\Interfaces;


/**
 * Interface EventChannelInterface
 * @package App\DesignPatterns\Foundamental\EventChannel\Interfaces
 *
 * Инерфейс канала событий
 * Связающее звено между подписчиком и издателями.
 */
interface EventChannelInterface
{
    /**
     * Издатель уведомляет каналу о том что надо
     * всех кто подписан на тему $topic уведомить данным $data
     *
     * @param string $topic
     * @param        $data
     *
     * @return mixed
     */
    public function publish($topic, $data);

    /**
     * Подпсчик $subscriber подписывается на событие (данные инфу итд...) $topic
     *
     * @param string    $topic
     * @param SubscriberInterface $subscriber
     * @return mixed
     */
    public function subscribe($topic, SubscriberInterface $subscriber);
}

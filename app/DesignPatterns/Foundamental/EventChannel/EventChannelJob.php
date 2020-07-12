<?php


namespace App\DesignPatterns\Foundamental\EventChannel;


use App\DesignPatterns\Foundamental\EventChannel\Classes\EventChannel;
use App\DesignPatterns\Foundamental\EventChannel\Classes\Publisher;
use App\DesignPatterns\Foundamental\EventChannel\Classes\Subscriber;
use stdClass;

class EventChannelJob
{

    public function run()
    {
        $newsChannel = new EventChannel();

        $highgardenGroup = new Publisher('highgarden-news', $newsChannel);
        $winterfellNews = new Publisher('winterfell-news', $newsChannel);
        $winterfellDaily = new Publisher('winterfell-news', $newsChannel);

        $sansa = new Subscriber('Sansa Stark');
        $arya = new Subscriber('Arya Stark');
        $cersei = new Subscriber('Cersei Lannister');
        $snow = new Subscriber('John Snow');

        $newsChannel->subscribe('highgarden-news', $cersei);

        $highgardenGroup->publish('barev bolorin');
    }

    static function getDescription()
    {
        $descObj = new stdClass();

        $description =
            "Канал событий — фундаментальный шаблон проектирования,
            используется для создания канала связи и коммуникации через
            него посредством событий. Этот канал обеспечивает возможность
            разным издателям публиковать события и подписчикам, подписываясь
            на них, получать уведомления."
        ;

        $descObj->description = $description;
        $descObj->url = 'https://ru.wikipedia.org/wiki/%D0%9A%D0%B0%D0%BD%D0%B0%D0%BB_%D1%81%D0%BE%D0%B1%D1%8B%D1%82%D0%B8%D0%B9_(%D1%88%D0%B0%D0%B1%D0%BB%D0%BE%D0%BD_%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F)';

        return $descObj;
    }

}

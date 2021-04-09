<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Foundamental\EventChannel\EventChannelJob;
use App\DesignPatterns\Foundamental\Delegation\AppMessenger;
use App\DesignPatterns\Foundamental\PropertyContainer\BlogPost;
use App\DesignPatterns\Foundamental\PropertyContainer\PropertyContainer;
use stdClass;

class FundamentalPatternsController extends Controller
{
    public function PropertyContainer(){
        $name = 'Контейнер свойств (Property Container)';
        $description = PropertyContainer::getDescription();

        $item = new BlogPost();

        $item->addProperty('prop_1', 59);
        $item->addProperty('prop_2', 99);
        $item->setProperty('prop_2', 98);
        $item->deleteProperty('prop_1');

        return view('dump', compact('name', 'description', 'item'));
    }

    public function Delegation(){
        $name = 'Делегирование (Delegation)';
        $description = AppMessenger::getDescription();

        $messenger = new AppMessenger();

        $messenger->toEmail()
            ->setRecipient('Artur@gmail.com')
            ->setSender('Armen')
            ->setMessage('Hello')
            ->send();

        $messenger->toSms()
            ->setRecipient('043023622')
            ->setSender('Armen')
            ->setMessage('Hello')
            ->send();

        \Debugbar::info($messenger);

        return view('dump', compact('name', 'description'));
    }

    public function EventChannel(){
        $name = 'Канал событий (event channel)';
        $description = EventChannelJob::getDescription();

        $item = new EventChannelJob();
        $item->run();

        return view('dump', compact('name', 'description'));
    }

    public function InterfacePattern(){
        $name = 'Интерфейс (Interface)';
        $description = new stdClass();
        $description->description = "Интерфейс — основной шаблон проектирования,
        являющийся общим методом для структурирования компьютерных
        программ для того, чтобы их было проще понять. В общем, интерфейс — это класс,
        который обеспечивает программисту простой или более программно-специфический способ доступа
        к другим классам.";
        $description->url = "https://ru.wikipedia.org/wiki/%D0%98%D0%BD%D1%82%D0%B5%D1%80%D1%84%D0%B5%D0%B9%D1%81_(%D1%88%D0%B0%D0%B1%D0%BB%D0%BE%D0%BD_%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F)";

        return view('dump', compact('name', 'description'));
    }
}

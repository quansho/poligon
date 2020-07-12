<?php


namespace App\DesignPatterns\Creational\AbstractFactory\Classes;


use App\DesignPatterns\Creational\AbstractFactory\Interfaces\ButtonInterface;

class ButtonTailwind implements ButtonInterface
{
    public function draw()
    {
        return __CLASS__;
    }
}

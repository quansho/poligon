<?php


namespace App\DesignPatterns\Creational\AbstractFactory\Classes;


use App\DesignPatterns\Creational\AbstractFactory\Interfaces\CheckboxInterface;

class CheckboxTailwind implements CheckboxInterface
{
    public function draw()
    {
        return __CLASS__;
    }

}

<?php


namespace App\DesignPatterns\Creational\AbstractFactory\Factories;

use App\DesignPatterns\Creational\AbstractFactory\Classes\ButtonTailwind;
use App\DesignPatterns\Creational\AbstractFactory\Classes\CheckboxTailwind;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\ButtonInterface;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\CheckboxInterface;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;

class TailwindFactory implements GuiFactoryInterface
{
    public function buildButton(): ButtonInterface
    {
        return new ButtonTailwind();
    }

    public function buildCheckbox(): CheckboxInterface
    {
        return new CheckboxTailwind();
    }
}

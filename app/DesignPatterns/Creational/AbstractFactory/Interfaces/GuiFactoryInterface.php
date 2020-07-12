<?php


namespace App\DesignPatterns\Creational\AbstractFactory\Interfaces;

/**
 * Interface GuiFactoryInterface
 * @package App\DesignPatterns\Creational\AbstractFactory\Interfaces
 */
interface GuiFactoryInterface
{
    /**
     * @return ButtonInterface
     */
    public function buildButton() : ButtonInterface;

    /**
     * @return CheckboxInterface
     */
    public function buildCheckbox()  :  CheckboxInterface;
}

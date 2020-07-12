<?php


namespace App\DesignPatterns\Creational\AbstractFactory;


use App\DesignPatterns\Creational\AbstractFactory\Factories\BootstrapFactory;
use App\DesignPatterns\Creational\AbstractFactory\Factories\TailwindFactory;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;
use stdClass;

class GuiKitFactory
{
    /**
     * @param $type
     * @return GuiFactoryInterface
     * @throws \Exception
     */
    public function getFactory($type) : GuiFactoryInterface
    {
        switch ($type) {
            case 'bootstrap':
                $factory = new BootstrapFactory();
                break;
            case 'tailwind':
                $factory = new TailwindFactory();
                break;
            default:
                throw new \Exception("Не исвестный тип фабрики [{$type}]");
        }

        return $factory;
    }

    static function getDescription()
    {
        $descObj = new stdClass();

        $description =
            "Делегирование — основной шаблон проектирования,
        в котором объект внешне выражает некоторое поведение,
        но в реальности передаёт ответственность за выполнение
        этого поведения связанному объекту.
        ";

        $descObj->description = $description;
        $descObj->url = 'https://en.wikipedia.org/wiki/Delegation_pattern';

        return $descObj;
    }

}

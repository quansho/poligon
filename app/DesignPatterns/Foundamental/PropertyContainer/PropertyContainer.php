<?php

namespace App\DessignPatterns\Foundamental\PropertyContainer;

use App\DessignPatterns\Foundamental\PropertyContainer\Interfaces\PropertyContainerInterface;
use stdClass;

class PropertyContainer implements PropertyContainerInterface
{

    private $propertyContainer = [];

    static function getDescription(){
        $descObj = new stdClass();

        $description =
           " Контейнер свойств, предоставляет механизм
        для динамического расширения объектов
        дополнительными атрибутами во время
        выполнения. Кроме этого, приложению могут
        потребоваться ещё модули, которые явным
        образом используют преимущества нового свойства,
        если оно было добавлено."
        ;

        $descObj->description = $description;
        $descObj->url = 'https://ru.wikipedia.org/wiki/%D0%9A%D0%BE%D0%BD%D1%82%D0%B5%D0%B9%D0%BD%D0%B5%D1%80_%D1%81%D0%B2%D0%BE%D0%B9%D1%81%D1%82%D0%B2_(%D1%88%D0%B0%D0%B1%D0%BB%D0%BE%D0%BD_%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F)';

        return $descObj;

    }
//
    public function getProperty($propertyName)
    {
        return $this->propertyContainer[$propertyName] ?? null;
    }

    public function setProperty($propertyName, $value)
    {
        $existsProperty = !isset($this->propertyContainer[$propertyName]);
        if ($existsProperty){
            throw new \Exception("Property [{$propertyName}] not found");
        }

        $this->propertyContainer[$propertyName] = $value;
    }

    public function deleteProperty($propertyName)
    {
        unset($this->propertyContainer[$propertyName]);
    }

    public function addProperty($propertyName, $value)
    {
        $this->propertyContainer[$propertyName] = $value;
    }


}
?>

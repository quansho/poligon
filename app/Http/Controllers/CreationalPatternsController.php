<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Creational\AbstractFactory\GuiKitFactory;

class CreationalPatternsController extends Controller
{
    private $guiKit;

    public function __construct()
    {
        $this->guiKit = (new GuiKitFactory())->getFactory('bootstrap');
    }

    public function AbstractFactory(){
        $name = 'Абтрактная фабрика (Abstract Factories)';
        $description = GuiKitFactory::getDescription();

        $result[] = $this->guiKit->buildButton()->draw();
        $result[] = $this->guiKit->buildCheckbox()->draw();

        \Debugbar::info($result);
        return view('dump', compact('name', 'description'));
    }
}

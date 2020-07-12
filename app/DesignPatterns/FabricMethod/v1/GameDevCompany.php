<?php


namespace App\DesignPatterns\FabricMethod\v1;





use App\DesignPatterns\FabricMethod\v1\Developers\Designer;
use App\DesignPatterns\FabricMethod\v1\Developers\GameMaker;

class GameDevCompany extends Company
{

    public function getEmployees()
    {
        return [
            new Designer(),
            new GameMaker()
        ];
    }

}

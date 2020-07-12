<?php


namespace App\DesignPatterns\FabricMethod\v1\Developers;


use App\DesignPatterns\FabricMethod\v1\IEmployee;

class GameMaker implements IEmployee
{

    public function doWork()
    {
        var_dump(__METHOD__);
    }

}

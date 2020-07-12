<?php


namespace App\DesignPatterns\FabricMethod\v1;


use App\DesignPatterns\FabricMethod\v1\Developers\JsDev;
use App\DesignPatterns\FabricMethod\v1\Developers\PhpDev;

class WebDevCompany extends Company
{

    public function getEmployees()
    {
        return [
          new JsDev(),
          new PhpDev
        ];
    }

}

<?php

namespace App\Http\Controllers;

use App\DesignPatterns\FabricMethod\v1\Company;
use App\DesignPatterns\FabricMethod\v1\GameDevCompany;
use App\DesignPatterns\FabricMethod\v1\WebDevCompany;
use Illuminate\Http\Request;

class PatternsController extends Controller
{

    public function fabricMethod(){

        $fabric = app(WebDevCompany::class);

        $res = $fabric->makeSoftware();
    }
}

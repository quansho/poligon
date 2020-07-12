<?php


namespace App\DesignPatterns\FabricMethod\v1;


abstract class Company
{

    public abstract function getEmployees();

    public function makeSoftware(){
        $employees = $this->getEmployees();

        foreach ($employees as $employee) {
            $employee->doWork();
        }
    }

}

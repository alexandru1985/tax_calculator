<?php

namespace App\Services;

use App\Enums\Constant;

class SalaryCalculator 
{
    public function getGrossAnnualSalary(int|float $salary): int|float 
    {
        return $salary;
    }

    public function getGrossMonthlySalary(int|float $salary): int|float 
    {
        return ($salary / Constant::MONTHS->value);
    }

    public function getNetAnnualSalary(int|float $salary, int|float $totalTax): int|float 
    {
        return ($salary - $totalTax);
    }

    public function getNetMonthlySalary(int|float $salary, int|float $totalTax): int|float 
    {
        return ($salary - $totalTax) / Constant::MONTHS->value;
    }

    public function getAnnualTaxPaid(int|float $totalTax): int|float 
    {
        return $totalTax;
    }

    public function getMonthlyTaxPaid(int|float $totalTax): int|float 
    {
        return ($totalTax / Constant::MONTHS->value);
    }
}


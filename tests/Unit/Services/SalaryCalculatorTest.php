<?php

namespace Tests\Unit\Services;

use App\Services\SalaryCalculator;
use Tests\TestCase;

class SalaryCalculatorTest extends TestCase
{
    private SalaryCalculator $salaryCalculator;
    private int|float $salary;
    private int|float $totalTax;

    protected function setUp(): void
    {
        parent::setUp();
        $this->salaryCalculator = new SalaryCalculator();
        $this->salary = 60000;
        $this->totalTax = 19000;
    }

    public function testGetGrossAnnualSalary()
    {
        $result = $this->salaryCalculator->getGrossAnnualSalary($this->salary);
        $this->assertEquals($this->salary, $result);
    }

    public function testGetGrossMonthlySalary()
    {
        $result = $this->salaryCalculator->getGrossMonthlySalary($this->salary);
        $this->assertEquals(5000, $result);
    }

    public function testGetNetAnnualSalary()
    {
        $result = $this->salaryCalculator->getNetAnnualSalary($this->salary, $this->totalTax);
        $this->assertEquals(41000, $result);
    }

    public function testGetNetMonthlySalary()
    {
        $result = $this->salaryCalculator->getNetMonthlySalary($this->salary, $this->totalTax);
        $this->assertEquals(3417, round($result));
    }

    public function testGetAnnualTaxPaid()
    {
        $result = $this->salaryCalculator->getAnnualTaxPaid($this->totalTax);
        $this->assertEquals($this->totalTax, $result);
    }

    public function testGetMonthlyTaxPaid()
    {
        $result = $this->salaryCalculator->getMonthlyTaxPaid($this->totalTax);
        $this->assertEquals(1583, round($result));
    }
}

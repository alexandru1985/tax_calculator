<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\SalaryRequest;
use App\Services\TaxCalculator;
use App\Services\SalaryCalculator;
use App\Services\Formatter;

class IncomeController extends Controller
{
    public function __construct(
        protected TaxCalculator $taxCalculator,
        protected SalaryCalculator $salaryCalculator
    ) {  
    }

    public function calculateSalaryTax(SalaryRequest $request): JsonResponse
    {
        $salary = $request->validated('salary');
        $totalTax = $this->taxCalculator->getTax($salary);

        $results = [
            'gross_annual_salary' => 
                Formatter::formatNumber(
                    $this->salaryCalculator->getGrossAnnualSalary($salary)
                ),
            'gross_monthly_salary' => 
                Formatter::formatNumber(
                    $this->salaryCalculator->getGrossMonthlySalary($salary)
                ),
            'net_annual_salary' => 
                Formatter::formatNumber(
                    $this->salaryCalculator->getNetAnnualSalary($salary, $totalTax)
                ),
            'net_monthly_salary' => 
                Formatter::formatNumber(
                    $this->salaryCalculator->getNetMonthlySalary($salary, $totalTax)
                ),
            'annual_tax_paid' => 
                Formatter::formatNumber(
                    $this->salaryCalculator->getAnnualTaxPaid($totalTax)
                ),
            'monthly_tax_paid' => 
                Formatter::formatNumber(
                    $this->salaryCalculator->getMonthlyTaxPaid($totalTax)
                )
        ];

        return response()->json($results);
    }
}

<?php

namespace Tests\Feature\Controllers;

use Illuminate\Http\Response;
use Tests\TestCase;

class IncomeControllerTest extends TestCase
{
    public function testCalculateTax()
    {
        $response = $this->postJson('/api/calculate-salary-tax', ['salary' => 30000])
            ->assertStatus(Response::HTTP_OK)
            ->assertJson([
                'gross_annual_salary' => '30,000.00',
                'gross_monthly_salary' => '2,500.00',
                'net_annual_salary' => '23,000.00',
                'net_monthly_salary' => '1,916.67',
                'annual_tax_paid' => '7,000.00',
                'monthly_tax_paid' => '583.33'
        ]);
    }
}

<?php

namespace Tests\Unit\Models;

use App\Models\TaxBand;
use App\Models\Employee;
use Tests\TestCase;

class EmployeeModelTest extends TestCase
{
    public function testTaxBandRelationship()
    {
        $employee = Employee::firstOrFail();
        $taxBand = TaxBand::find($employee->tax_band_id);
        
        $this->assertEquals($employee->tax_band_id, $taxBand->id);
        $this->assertInstanceOf(TaxBand::class, $employee->taxBand);
    }
}

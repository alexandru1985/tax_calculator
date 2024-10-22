<?php

namespace Tests\Unit\Models;

use App\Models\TaxBand;
use App\Models\Employee;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;

class TaxBandModelTest extends TestCase
{
    public function testEmployeesRelationship()
    {
        $taxBand = TaxBand::firstOrFail();
        $employees = Employee::where('tax_band_id', $taxBand->getTaxBandId())->get();

        $this->assertEquals($employees->count(), $taxBand->employees()->count());
        $this->assertInstanceOf(Employee::class, $taxBand->employees()->first());
    }

    public function testGetTaxBandBDetails()
    {
        $taxBand = TaxBand::getTaxBandBDetails();

        $this->assertNotNull($taxBand);
        $this->assertEquals('Tax Band B', $taxBand->getTaxBandName());
        $this->assertEquals(5000, $taxBand->getTaxBandLowerLimit());
        $this->assertEquals(20000, $taxBand->getTaxBandUpperLimit());
    }

    public function testGetTaxBandCDetails()
    {
        $taxBand = TaxBand::getTaxBandCDetails();

        $this->assertNotNull($taxBand);
        $this->assertEquals('Tax Band C', $taxBand->getTaxBandName());
        $this->assertEquals(20000, $taxBand->getTaxBandLowerLimit());
        $this->assertNull($taxBand->getTaxBandUpperLimit());
    }

    public function testGetAllTaxBands()
    {
        $taxBands = TaxBand::getAllTaxBands();

        $this->assertNotEmpty($taxBands);
        $this->assertInstanceOf(Collection::class, $taxBands);
    }
}

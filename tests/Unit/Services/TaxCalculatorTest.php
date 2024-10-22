<?php

namespace Tests\Unit\Services;

use App\Services\TaxCalculator;
use App\Classes\TaxBandBStrategy;
use App\Classes\TaxBandCStrategy;
use Tests\TestCase;

class TaxCalculatorTest extends TestCase
{
    private TaxBandBStrategy $taxBandBStrategy;
    private TaxBandCStrategy $taxBandCStrategy;
    private TaxCalculator $taxCalculator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->taxBandBStrategy = new TaxBandBStrategy();
        $this->taxBandCStrategy = new TaxBandCStrategy();
        $this->taxCalculator = new TaxCalculator(
            $this->taxBandBStrategy,
            $this->taxBandCStrategy
        );
    }

    public function testGetTaxFromBandBStrategy()
    {
        $income = 20000;
        $totalTax = $this->taxCalculator->getTax($income);
        $this->assertEquals(3000, $totalTax);
    }

    public function testGetTaxFromBandCStrategy()
    {
        $income = 30000;
        $totalTax = $this->taxCalculator->getTax($income);
        $this->assertEquals(7000, $totalTax); 
    }
}


<?php

namespace Tests\Unit\Services;

use App\Services\TaxCalculator;
use App\Classes\TaxBandAStrategy;
use App\Classes\TaxBandBStrategy;
use App\Classes\TaxBandCStrategy;
use Tests\TestCase;

class TaxCalculatorTest extends TestCase
{
    private TaxBandAStrategy $taxBandAStrategy;
    private TaxBandBStrategy $taxBandBStrategy;
    private TaxBandCStrategy $taxBandCStrategy;
    private TaxCalculator $taxCalculator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->taxBandAStrategy = new TaxBandAStrategy();
        $this->taxBandBStrategy = new TaxBandBStrategy();
        $this->taxBandCStrategy = new TaxBandCStrategy();
        $this->taxCalculator = new TaxCalculator(
            $this->taxBandAStrategy,
            $this->taxBandBStrategy,
            $this->taxBandCStrategy
        );
    }

    public function testGetTaxFromBandAStrategy()
    {
        $income = 5000;
        $totalTax = $this->taxCalculator->getTax($income);
        $this->assertEquals(0, $totalTax);
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


<?php

namespace Tests\Unit\Classes;

use App\Classes\TaxBandBStrategy;
use Tests\TestCase;

class TaxBandBStrategyTest extends TestCase
{
    public function testCalculateTaxWithinLimit()
    {
        $income = 20000;
        $strategy = new TaxBandBStrategy();
        $result = $strategy->calculateTax($income);

        $this->assertEquals(3000, $result);
    }

    public function testCalculateTaxBelowLimit()
    {
        $income = 4000;
        $strategy = new TaxBandBStrategy();
        $result = $strategy->calculateTax($income);

        $this->assertEquals(0, $result);
    }

    public function testCalculateTaxAboveLimit()
    {
        $income = 25000;
        $strategy = new TaxBandBStrategy();
        $result = $strategy->calculateTax($income);

        $this->assertEquals(3000, $result);
    }
}

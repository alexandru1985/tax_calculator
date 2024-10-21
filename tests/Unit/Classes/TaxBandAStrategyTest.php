<?php

namespace Tests\Unit\Classes;

use App\Classes\TaxBandAStrategy;
use Tests\TestCase;

class TaxBandAStrategyTest extends TestCase
{
    public function testCalculateTaxWithinLimit()
    {
        $income = 5000;
        $strategy = new TaxBandAStrategy();
        $result = $strategy->calculateTax($income);

        $this->assertEquals(0, $result);
    }

    public function testCalculateTaxBelowLimit()
    {
        $income = 4000;
        $strategy = new TaxBandAStrategy();
        $result = $strategy->calculateTax($income);

        $this->assertEquals(0, $result);
    }

    public function testCalculateTaxAboveLimit()
    {
        $income = 6000;
        $strategy = new TaxBandAStrategy();
        $result = $strategy->calculateTax($income);

        $this->assertEquals(0, $result);
    }
}

<?php

namespace Tests\Unit\Classes;

use App\Classes\TaxBandCStrategy;
use Tests\TestCase;

class TaxBandCStrategyTest extends TestCase
{
    public function testCalculateTaxBelowLimit()
    {
        $income = 15000;
        $strategy = new TaxBandCStrategy();
        $result = $strategy->calculateTax($income);

        $this->assertEquals(0, $result);
    }

    public function testCalculateTaxAboveLimit()
    {
        $income = 30000;
        $strategy = new TaxBandCStrategy();
        $result = $strategy->calculateTax($income);

        $this->assertEquals(4000, $result);
    }
}

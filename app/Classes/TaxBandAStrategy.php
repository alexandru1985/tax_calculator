<?php

namespace App\Classes;

use App\Enums\Constant;
use App\Models\TaxBand;
use App\Interfaces\TaxCalculationStrategy;

class TaxBandAStrategy implements TaxCalculationStrategy
{
    public function calculateTax(int|float $income): int|float
    {
        $taxBandA = TaxBand::getTaxBandADetails();
        $incomeInBandA = min($income, $taxBandA->getTaxBandUpperLimit());

        return $incomeInBandA * ($taxBandA->getTaxBandRate() / Constant::ONE_HUNDRED->value);
    }
}



<?php

namespace App\Classes;

use App\Enums\Constant;
use App\Models\TaxBand;
use App\Interfaces\TaxCalculationStrategy;

class TaxBandBStrategy implements TaxCalculationStrategy
{
    public function calculateTax(int|float $income): int|float
    {
        $taxBandB = TaxBand::getTaxBandBDetails();

        if ($income > $taxBandB->getTaxBandLowerLimit()) {
            $incomeInBandB = min(
                $income - $taxBandB->getTaxBandLowerLimit(),
                $taxBandB->getTaxBandUpperLimit() - $taxBandB->getTaxBandLowerLimit()
            );
            
            return $incomeInBandB * ($taxBandB->getTaxBandRate() / Constant::ONE_HUNDRED->value);
        }

        return Constant::ZERO->value;
    }
}



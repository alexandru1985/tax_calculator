<?php
namespace App\Classes;

use App\Enums\Constant;
use App\Models\TaxBand;
use App\Interfaces\TaxCalculationStrategy;

class TaxBandCStrategy implements TaxCalculationStrategy
{
    public function calculateTax(int|float $income): int|float
    {
        $taxBandC = TaxBand::getTaxBandCDetails();
        
        if ($income > $taxBandC->getTaxBandLowerLimit()) {
            $incomeInBandC = $income - $taxBandC->getTaxBandLowerLimit(); 

            return $incomeInBandC * ($taxBandC->getTaxBandRate() / Constant::ONE_HUNDRED->value);
        }

        return Constant::ZERO->value;
    }
}




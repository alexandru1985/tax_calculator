<?php

namespace App\Services;

use App\Enums\Constant;
use App\Classes\TaxBandBStrategy;
use App\Classes\TaxBandCStrategy;

class TaxCalculator
{
    public function __construct(
        protected TaxBandBStrategy $taxBandBStrategy,
        protected TaxBandCStrategy $taxBandCStrategy
    ) {   
    }

    public function getTax(int|float $income): int|float
    {
        $totalTax = $this->taxBandBStrategy->calculateTax($income) +
                    $this->taxBandCStrategy->calculateTax($income);

        return $totalTax;
    }
}


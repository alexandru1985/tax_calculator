<?php

namespace App\Services;

use App\Enums\Constant;
use App\Classes\TaxBandAStrategy;
use App\Classes\TaxBandBStrategy;
use App\Classes\TaxBandCStrategy;

class TaxCalculator
{
    public function __construct(
        protected TaxBandAStrategy $taxBandAStrategy,
        protected TaxBandBStrategy $taxBandBStrategy,
        protected TaxBandCStrategy $taxBandCStrategy
    ) {   
    }

    public function getTax(int|float $income): int|float
    {
        $totalTax = $this->taxBandAStrategy->calculateTax($income) +
                    $this->taxBandBStrategy->calculateTax($income) +
                    $this->taxBandCStrategy->calculateTax($income);

        return $totalTax;
    }
}


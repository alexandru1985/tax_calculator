<?php

namespace App\Interfaces;

interface TaxCalculationStrategy
{
    public function calculateTax(int|float $income): int|float;
}
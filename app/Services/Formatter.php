<?php

namespace App\Services;

use App\Enums\Constant;

class Formatter 
{
    public static function formatNumber(int|float $number): string 
    {
        return number_format($number, Constant::TWO_DECIMALS->value);
    }
}


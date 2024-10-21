<?php

namespace Tests\Unit\Services;

use App\Services\Formatter;
use Tests\TestCase;

class FormatterTest extends TestCase
{
    public function testFormatNumberWithTwoDecimals()
    {
        $number = 30000;
        $expected = '30,000.00';
        $result = Formatter::formatNumber($number);

        $this->assertEquals($expected, $result);
    }
}
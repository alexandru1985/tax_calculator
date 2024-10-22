<?php

namespace App\Http\Controllers;

use App\Models\TaxBand;
use Illuminate\Http\JsonResponse;

class TaxController extends Controller
{
    public function getAllTaxBands(): JsonResponse
    {
        $taxBands = TaxBand::getAllTaxBands();

        return response()->json($taxBands);
    }
}

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\IncomeController;

Route::post('/calculate-salary-tax', [IncomeController::class, 'calculateSalaryTax']);
Route::get('/tax-bands', [TaxController::class, 'getAllTaxBands']);

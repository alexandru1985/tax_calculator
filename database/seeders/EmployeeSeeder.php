<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\TaxBand;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $taxBandA = TaxBand::where('name', 'Tax Band A')->first();
        $taxBandB = TaxBand::where('name', 'Tax Band B')->first();
        $taxBandC = TaxBand::where('name', 'Tax Band C')->first();

        Employee::create(['name' => 'John Doe', 'salary' => 5000, 'tax_band_id' => $taxBandA->id]);
        Employee::create(['name' => 'Michael Brown', 'salary' => 10000, 'tax_band_id' => $taxBandB->id]);
        Employee::create(['name' => 'Emily Johnson', 'salary' => 21000, 'tax_band_id' => $taxBandC->id]);
        Employee::create(['name' => 'Michael Brown', 'salary' => 7000, 'tax_band_id' => $taxBandB->id]);
        Employee::create(['name' => 'Sarah Davis', 'salary' => 30000, 'tax_band_id' => $taxBandC->id]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'salary', 'tax_band_id'];

    public function taxBand(): BelongsTo
    {
        return $this->belongsTo(TaxBand::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class TaxBand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'lower_limit', 'upper_limit', 'rate'];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public static function getTaxBandBDetails(): ?TaxBand
    {
        return self::where('name', 'Tax Band B')->first();
    }

    public static function getTaxBandCDetails(): ?TaxBand
    {
        return self::where('name', 'Tax Band C')->first();
    }

    public static function getAllTaxBands(): Collection
    {
        return self::with('employees')->get();
    }

    public function getTaxBandId(): int
    {
        return $this->id;
    }

    public function getTaxBandName(): string
    {
        return $this->name;
    }

    public function getTaxBandUpperLimit(): ?int
    {
        return $this->upper_limit;
    }

    public function getTaxBandLowerLimit(): int
    {
        return $this->lower_limit;
    }

    public function getTaxBandRate(): int
    {
        return $this->rate;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $with = ['cashflows'];
    protected $fillable = [
        'name',
        'site_manager',
        'tax',
        'invest_capital',
        'invest_noncapital',
        'depreciation',
        'user_id'
    ];

    public function cashflows() : HasMany
    {
        return $this->hasMany(Cashflow::class)->orderBy('year');
    }
}

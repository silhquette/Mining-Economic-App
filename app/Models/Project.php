<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $with = ['cashflows'];

    public function cashflows() : HasMany
    {
        return $this->hasMany(Cashflow::class);
    }
}

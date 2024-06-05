<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashflow extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'production',
        'income',
        'opex',
        'taxable_income',
        'net_cashflow',
        'project_id'
    ];
}

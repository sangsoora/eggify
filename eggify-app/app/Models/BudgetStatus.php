<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetStatus extends Model
{
    use HasFactory;

    protected $table = 'budgets_status';

    protected $fillable = [
        'name',
    ];
}

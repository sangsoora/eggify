<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatorEmployee extends Model
{
    use HasFactory;

    protected $table = 'operators_company_employees';

    protected $fillable = [
        'name',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatorJob extends Model
{
    use HasFactory;

    protected $table = 'operators_job';

    protected $fillable = [
        'name',
    ];
}

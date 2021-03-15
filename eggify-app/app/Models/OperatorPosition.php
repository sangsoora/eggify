<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatorPosition extends Model
{
    use HasFactory;

    protected $table = 'operators_position';

    protected $fillable = [
        'name',
    ];
}

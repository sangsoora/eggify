<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    protected $table = 'users_type';

    protected $fillable = [
        'name',
    ];

    public function scopeTypeProvider($query)
    {
        return $query->where('name', 'Provider');
    }

    public function scopeTypeOperator($query)
    {
        return $query->where('name', 'Operator');
    }
}

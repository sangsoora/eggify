<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'permissions_role');
    }

    public function scopeGetAdmin($query)
    {
        return $query->where('name', 'admin');
    }

    public function scopeGetUser($query)
    {
        return $query->where('name', 'user');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderType extends Model
{
    use HasFactory;

    protected $table = 'providers_type';

    protected $fillable = [
        'name',
    ];

    public function scopeDistributor($query)
    {
        return $query->where('name', 'distributor');
    }

    public function scopeProducer($query)
    {
        return $query->where('name', 'producer');
    }
}

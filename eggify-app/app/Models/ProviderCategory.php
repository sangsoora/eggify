<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderCategory extends Model
{
    use HasFactory;

    protected $table = 'providers_category';

    protected $fillable = [
        'name',
    ];

    public function provider_subcategory()
    {
        return $this->belongsToMany(ProviderSubcategory::class, 'providers_category_subcategory', 'provider_category_id', 'provider_subcategory_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderSubcategory extends Model
{
    use HasFactory;

    protected $table = 'providers_subcategory';

    protected $fillable = [
        'name',
    ];

    public function provider_category()
    {
        return $this->belongsToMany(ProviderCategory::class, 'providers_category_subcategory', 'provider_subcategory_id', 'provider_category_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderCategorySubcategory extends Model
{
    use HasFactory;

    protected $table = 'providers_category_subcategory';

    protected $fillable = [
        'provider_category_id',
        'provider_subcategory_id',
    ];

    public function provider_category()
    {
        return $this->belongsTo(ProviderCategory::class, 'provider_category_id');
    }

    public function provider_subcategory()
    {
        return $this->belongsTo(ProviderSubcategory::class, 'provider_subcategory_id');
    }
}

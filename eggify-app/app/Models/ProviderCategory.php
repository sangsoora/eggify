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
        'icon'
    ];

    public function provider_subcategory()
    {
        return $this->belongsToMany(ProviderSubcategory::class, 'providers_category_subcategory', 'provider_category_id', 'provider_subcategory_id');
    }

    // Images

    public function getImageAltAttribute()
    {
        return explode('.', $this->icon)[0];
    }

    public function getUrlImageAttribute()
    {
        if ($this->icon && existsResource($this->getFolder() . $this->icon)) {
            return getUrlResource($this->getFolder() . $this->icon);
        }
        return '/assets/images/logo-placeholder.png';
    }

    public function getFolder()
    {
        return '/category/' . $this->id . '/';
    }
}

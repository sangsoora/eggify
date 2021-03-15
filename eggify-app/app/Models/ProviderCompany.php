<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderCompany extends Model
{
    use HasFactory;

    protected $table = 'providers_company';

    protected $fillable = [
        'name',
        'web',
        'logo',
        'years',
        'linkedin',
        'provider_id',
        'provider_company_employees_id',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }

    public function employee()
    {
        return $this->belongsTo(ProviderEmployee::class, 'provider_company_employees_id');
    }

    // Images

    public function getImageAltAttribute()
    {
        return explode('.', $this->logo)[0];
    }

    public function getUrlImageAttribute()
    {
        if ($this->logo && existsResource($this->getFolder() . $this->logo)) {
            return getUrlResource($this->getFolder() . $this->logo);
        }
        return '/assets/images/no-product.png';
    }

    public function getFolder()
    {
        return '/provider/' . $this->id . '/';
    }
}

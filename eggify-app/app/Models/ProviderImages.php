<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderImages extends Model
{
    use HasFactory;

    protected $table = 'providers_images';

    protected $fillable = [
        'name',
        'provider_id',
    ];

    public function provider()
    {
        return $this->hasOne(Provider::class, 'id', 'provider_id');
    }

    public function getImageAltAttribute()
    {
        return explode('.', $this->name)[0];
    }

    public function getUrlImageAttribute()
    {
        if ($this->name && existsResource($this->getFolder() . $this->name)) {
            return getUrlResource($this->getFolder() . $this->name);
        }
        return '/assets/images/no-product.png';
    }

    public function deleteImage()
    {
        if ($this->name && existsResource($this->getFolder() . $this->name)) {
            return deleteResource($this->getFolder() . $this->name);
        }

        return false;
    }

    public function getFolder()
    {
        return '/provider/' . $this->provider_id . '/';
    }
}

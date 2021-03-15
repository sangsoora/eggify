<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'description',
        'policy_consent',
        'user_id',
        'provider_type_id',
        'provider_category_id',
        'provider_subcategory_id',
        'provider_plan_id',
        'postal_code_id',
        'provider_employees_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function provider_type()
    {
        return $this->belongsTo(ProviderType::class, 'provider_type_id');
    }

    public function provider_category()
    {
        return $this->belongsTo(ProviderCategory::class, 'provider_category_id');
    }

    public function provider_subcategory()
    {
        return $this->belongsTo(ProviderSubcategory::class, 'provider_subcategory_id');
    }

    public function provider_plan()
    {
        return $this->belongsTo(ProviderPlan::class, 'provider_plan_id');
    }

    public function rating()
    {
        return $this->belongsToMany(Rating::class, 'ratings_providers','provider_id', 'rating_id');
    }

    public function postal_code()
    {
        return $this->belongsTo(PostalCode::class, 'postal_code_id');
    }

    public function provider_employee()
    {
        return $this->belongsTo(ProviderEmployee::class, 'provider_employees_id');
    }

    public function provider_company()
    {
        return $this->hasOne(ProviderCompany::class, 'provider_id');
    }

    public function scopeGetByCity($query, $id)
    {
        return $query->whereHas('providers', function ($query) use ($id) {
            $query->where('order_items.order_item_id', $id);
        });
    }

    public function scopeDistributor($query)
    {
        return $query->whereHas('provider_type', function ($provider_type) {
            $provider_type->distributor();
        });
    }

    public function scopeProducer($query)
    {
        return $query->whereHas('provider_type', function ($provider_type) {
            $provider_type->producer();
        });
    }
}

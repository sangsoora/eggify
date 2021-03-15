<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatorCompany extends Model
{
    use HasFactory;

    protected $table = 'operators_company';

    protected $fillable = [
        'name',
        'web',
        'logo',
        'years',
        'linkedin',
        'operator_id',
        'operator_company_employees_id',
    ];

    public function operator()
    {
        return $this->belongsTo(Operator::class, 'operator_id');
    }

    public function employee()
    {
        return $this->belongsTo(OperatorEmployee::class, 'operator_company_employees_id');
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
        return '/company/' . $this->id . '/';
    }
}

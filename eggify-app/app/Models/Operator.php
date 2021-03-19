<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'phone',
        'position',
        'address',
        'policy_consent',
        'user_id',
        'operator_job_id',
        'operator_job_tag_id',
        'operator_employees_id',
        'operator_position_id',
        'postal_code_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function operator_job()
    {
        return $this->belongsTo(OperatorJob::class, 'operator_job_id');
    }

    public function operator_job_tag()
    {
        return $this->belongsTo(OperatorJobTag::class, 'operator_job_tag_id');
    }

    public function operator_employee()
    {
        return $this->belongsTo(OperatorEmployee::class, 'operator_employees_id');
    }

    public function operator_position()
    {
        return $this->belongsTo(OperatorPosition::class, 'operator_position_id');
    }

    public function operator_company()
    {
        return $this->hasOne(OperatorCompany::class, 'operator_id');
    }

    public function postal_code()
    {
        return $this->belongsTo(Postal::class, 'postal_code_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderEmployee extends Model
{
    use HasFactory;

    protected $table = 'providers_company_employees';

    protected $fillable = [
        'name',
    ];
}

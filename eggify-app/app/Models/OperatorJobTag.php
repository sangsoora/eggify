<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatorJobTag extends Model
{
    use HasFactory;

    protected $table = 'operators_job_tag';

    protected $fillable = [
        'name',
    ];
}

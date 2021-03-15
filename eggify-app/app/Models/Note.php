<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'user_from_id',
        'user_to_id',
    ];

    public function user_from()
    {
        return $this->belongsTo(User::class, 'user_from_id');
    }

    public function user_to()
    {
        return $this->belongsTo(User::class, 'user_from_id');
    }
}

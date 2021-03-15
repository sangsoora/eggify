<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating',
        'recommended',
        'title',
        'comment',
        'photo',
        'user_id',
    ];

    public function rating_criteria()
    {
        return $this->hasMany(RatingRatingCriteria::class, 'rating_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

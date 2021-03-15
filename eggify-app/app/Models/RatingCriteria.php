<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingCriteria extends Model
{
    use HasFactory;

    protected $table = 'ratings_criteria';

    protected $fillable = [
        'name',
    ];

    public function rating_rating_criteria()
    {
        return $this->hasMany(RatingRatingCriteria::class, 'rating_criteria_id');
    }
}

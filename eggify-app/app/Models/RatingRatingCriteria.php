<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingRatingCriteria extends Model
{
    use HasFactory;

    protected $table = 'ratings_ratings_criteria';

    protected $fillable = [
        'rating',
        'rating_id',
        'rating_criteria_id',
    ];

    public function criteria()
    {
        return $this->belongsTo(RatingCriteria::class, 'rating_criteria_id');
    }

    public function rating()
    {
        return $this->belongsTo(Rating::class, 'rating_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingProvider extends Model
{
    use HasFactory;

    protected $table = 'ratings_providers';

    protected $fillable = [
        'provider_id',
        'rating_id',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }

    public function rating()
    {
        return $this->belongsTo(Rating::class, 'rating_id');
    }
}

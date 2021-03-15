<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetMessage extends Model
{
    use HasFactory;

    protected $table = 'budgets_messages';

    protected $fillable = [
        'message',
        'budget_id',
        'user_from_id',
        'user_to_id',
    ];

    public function user_from()
    {
        return $this->belongsTo(User::class, 'user_from_id');
    }

    public function user_to()
    {
        return $this->belongsTo(User::class, 'user_to_id');
    }

    public function budget()
    {
        return $this->belongsTo(Budget::class, 'budget_id');
    }
}

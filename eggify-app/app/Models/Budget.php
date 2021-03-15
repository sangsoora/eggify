<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'time',
        'user_from_id',
        'user_to_id',
        'budget_status_id',
    ];

    public function user_from()
    {
        return $this->belongsTo(User::class, 'user_from_id');
    }

    public function user_to()
    {
        return $this->belongsTo(User::class, 'user_to_id');
    }

    public function budget_status()
    {
        return $this->belongsTo(BudgetStatus::class, 'budget_status_id');
    }

    public function user_received()
    {
        return $this->belongsToMany(User::class, 'budgets_users', 'budget_id', 'user_to_id');
    }

    public function messages()
    {
        return $this->hasMany(BudgetMessage::class);
    }
}

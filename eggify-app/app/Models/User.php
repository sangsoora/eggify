<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class   User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'user_type_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function user_type()
    {
        return $this->belongsTo(UserType::class, 'user_type_id');
    }

    public function budget_received()
    {
        return $this->belongsToMany(Budget::class, 'budgets_users', 'user_to_id', 'budget_id');
    }

    public function budget_sended()
    {
        return $this->belongsToMany(Budget::class, 'budgets_users', 'user_from_id', 'budget_id');
    }

    public function operator()
    {
        return $this->hasOne(Operator::class, 'user_id');
    }

    public function provider()
    {
        return $this->hasOne(Provider::class, 'user_id');
    }

    public function scopeIsAdmin($query)
    {
        return ($this->role != null && $this->role->name == 'admin');
    }

    public function scopeIsUser($query)
    {
        return ($this->role != null && $this->role->name == 'user');
    }

    public function scopeIsProvider($query)
    {
        return ($this->user_type != null && $this->user_type->name == 'Provider');
    }

    public function scopeIsOperator($query)
    {
        return ($this->user_type != null && $this->user_type->name == 'Operator');
    }

    public function scopeGetAdmins($query)
    {
        return $query->where('role_id', 1);
    }

}

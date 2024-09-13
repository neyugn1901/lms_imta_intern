<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'fullname',
        'phone',
        'dob',
        'address',
        'sex',
        'email',
        'password',
        'image',
        'users_category_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function usercategory()
    {
        return $this->belongsTo(UserCategory::class, 'users_category_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }
}

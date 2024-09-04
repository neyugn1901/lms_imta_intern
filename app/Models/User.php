<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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
        'users_category_id', // Liên kết với bảng UserCategory
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relationship with UserCategory.
     */
    public function usercategory()
    {
        return $this->belongsTo(UserCategory::class, 'users_category_id');
    }

    /**
     * Relationship with Role.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }
}

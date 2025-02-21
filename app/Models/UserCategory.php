<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
{
    use HasFactory;
    protected $table = 'users_categories';

    protected $fillable = [
        'name',
        'description',
        'active',
    ];
}

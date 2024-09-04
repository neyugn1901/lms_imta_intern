<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'active',
    ];

    /**
     * Get the courses that belong to this category.
     */
    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id');
    }
}

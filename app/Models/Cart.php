<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    
    protected $table = 'carts';

    
    protected $fillable = ['student_id'];

    
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    
    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
}


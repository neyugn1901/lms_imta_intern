<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Định nghĩa bảng liên kết
    protected $table = 'carts';

    // Các thuộc tính có thể được gán hàng loạt
    protected $fillable = ['student_id'];

    // Định nghĩa quan hệ với model Student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Định nghĩa quan hệ với model CartItem
    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
}


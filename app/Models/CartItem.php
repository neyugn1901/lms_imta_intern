<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    // Định nghĩa bảng liên kết
    protected $table = 'cart_items';

    // Các thuộc tính có thể được gán hàng loạt
    protected $fillable = ['cart_id', 'course_id', 'quantity', 'price'];

    // Định nghĩa quan hệ với model Cart
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    // Định nghĩa quan hệ với model Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

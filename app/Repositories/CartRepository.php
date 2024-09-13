<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Course;

class CartRepository implements CartRepositoryInterface
{
    public function getCartByStudent($studentId)
    {
        return Cart::with('items.course')->where('student_id', $studentId)->first();
    }

    public function createCart($studentId)
    {
        return Cart::create(['student_id' => $studentId]);
    }

    public function addToCart($studentId, $courseId, $quantity)
    {
        $cart = Cart::firstOrCreate(['student_id' => $studentId]);

        $course = Course::findOrFail($courseId);

        return CartItem::create([
            'cart_id' => $cart->id,
            'course_id' => $courseId,
            'quantity' => $quantity,
            'price' => $course->price
        ]);
    }

    public function removeFromCart($cartItemId)
    {
        return CartItem::destroy($cartItemId);
    }

    public function clearCart($studentId)
    {
        $cart = Cart::where('student_id', $studentId)->first();
        if ($cart) {
            $cart->items()->delete();
        }
    }
}

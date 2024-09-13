<?php

namespace App\Repositories\Cart;

interface CartRepositoryInterface
{
    public function getCartByStudent($studentId);
    public function createCart($studentId);
    public function addToCart($studentId, $courseId, $quantity);
    public function removeFromCart($cartItemId);
    public function clearCart($studentId);
}

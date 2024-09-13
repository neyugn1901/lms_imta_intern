<?php

namespace App\Repositories\CartItem;

interface CartItemRepositoryInterface
{
    public function updateQuantity($cartItemId, $quantity);
}

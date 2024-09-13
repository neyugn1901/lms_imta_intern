<?php

namespace App\Repositories\CartItem;

use App\Models\CartItem;

class CartItemRepository implements CartItemRepositoryInterface
{
    public function updateQuantity($cartItemId, $quantity)
    {
        $cartItem = CartItem::findOrFail($cartItemId);
        $cartItem->update(['quantity' => $quantity]);
    }
}

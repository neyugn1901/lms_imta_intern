<?php

namespace App\Http\Controllers;

use App\Repositories\CartItemRepositoryInterface;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    protected $cartItemRepository;

    public function __construct(CartItemRepositoryInterface $cartItemRepository)
    {
        $this->cartItemRepository = $cartItemRepository;
    }

    
    public function destroy($itemId)
    {
        $this->cartItemRepository->removeItem($itemId);
        return redirect()->route('home.cart.index')->with('success', 'Đã xóa mục khỏi giỏ hàng.');
    }

    
    public function update(Request $request, $itemId)
    {
        $quantity = $request->quantity;
        $this->cartItemRepository->updateItemQuantity($itemId, $quantity);
        
        return redirect()->route('home.cart.index')->with('success', 'Đã cập nhật số lượng mục.');
    }
}

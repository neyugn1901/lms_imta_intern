<?php

namespace App\Http\Controllers;

use App\Repositories\CartRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    protected $cartRepository;

    public function __construct(CartRepositoryInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

   
    public function index()
    {
        $studentId = Auth::id(); 
        $cart = $this->cartRepository->getCartByStudentId($studentId);

        if (!$cart) {
            return redirect()->route('home.index')->with('error', 'Giỏ hàng của bạn hiện đang trống.');
        }

        $template = 'home.cart.index';
        return view('homepage.layout', compact('template', 'cart'));
    }

    
    public function add(Request $request)
    {
        $studentId = Auth::id(); 
        $courseId = $request->input('course_id'); 

        if (!$courseId) {
            return redirect()->back()->with('error', 'Khóa học không hợp lệ.');
        }

        
        $this->cartRepository->addCourseToCart($studentId, $courseId);

        return redirect()->route('home.cart.index')->with('success', 'Đã thêm khóa học vào giỏ hàng.');
    }

   
    public function clearCart()
    {
        $studentId = Auth::id();
        $this->cartRepository->clearCart($studentId);
        
        return redirect()->route('home.cart.index')->with('success', 'Đã xóa giỏ hàng.');
    }
}

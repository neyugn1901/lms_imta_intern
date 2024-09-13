<!-- resources/views/home/cart/index.blade.php -->
@extends('homepage.layout')

@section('content')
    <section class="cart-section">
        <div class="container">
            <h2>Giỏ hàng của bạn</h2>

            @if($cart->items->count() > 0)
                <ul>
                    @foreach($cart->items as $item)
                        <li>
                            {{ $item->course->course_name }} - {{ number_format($item->course->price, 0, ',', '.') }} VND
                            <a href="">Xóa</a>
                        </li>
                    @endforeach
                </ul>

                <a href="{{ route('home.cart.clear') }}" class="btn btn-danger">Xóa giỏ hàng</a>
            @else
                <p>Giỏ hàng của bạn hiện đang trống.</p>
            @endif
        </div>
    </section>
@endsection

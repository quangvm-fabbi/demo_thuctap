@extends('pages.layouts.master2')
@section('content')
    <div class="breadcrumb_container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ul>
                            <li><a href="{{ route('homepages') }}">Home ></a></li>
                            <li>Cart</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="cart_main_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('cart.updateCart') }}" method="post">
                        @csrf
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="img-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                                </thead>
                                @foreach($cart as $key => $cake)
                                <tbody>
                                <tr>
                                    <td class="product-thumbnail"><img src="{{ $cake['image'] }}" alt=""></td>
                                    <td class="product-name"><a href="#">{{ $cake['name'] }}</a></td>
                                    <td class="product-price"><span class="amount">{{ number_format($cake['price']) }}</span></td>
                                    <td class="product-quantity">
                                        <div class="quickview_plus_minus quick_cart">
                                            <div class="quickview_plus_minus_inner">
                                                <div class="cart-plus-minus cart_page">
                                                    <input type="text" value="{{ $cake['quanity'] }}" name="cart[{{ $key }}]" class="cart-plus-minus-box">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">{{ number_format($cake['price'] * $cake['quanity']) }}Đ</td>
                                    <td class="product-remove"><a href="{{ route('cart.deleteCart', ['id' => $key]) }}">X</a></td>
                                </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                        <div class="row table-responsive_bottom">
                            <div class="col-lg-7 col-sm-7 col-md-7">
                                <div class="buttons-carts">
                                    <input value="Update Cart" type="submit">
                                    <a href="{{ route('cart.deleteAll') }}">Delete Cart</a>
                                </div>
                                <div class="buttons-carts coupon">
                                    <h3>Coupon</h3>
                                    <p>Enter your coupon code if you have one.</p>
                                    <input placeholder="Coupon code" type="text">
                                    <input value="Apply Coupon" type="submit">
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-5 col-md-5">
                                <div class="cart_totals  text-right">
                                    <h2>Cart Totals</h2>
                                    <div class="cart-subtotal">
                                        <span>Total</span>
                                        <span>{{ $total }}</span>
                                    </div>
                                    <div class="order-total">
                                        <span><strong>Price</strong> </span>
                                        <span><strong>{{ $sumPrice }} </strong> </span>
                                    </div>
                                    <div class="wc-proceed-to-checkout">
                                        <a href="{{ route('checkout') }}">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection

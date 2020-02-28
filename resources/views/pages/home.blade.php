@extends('pages.layouts.master')
@section('content')
<div class="slider_area slider_area_two">
    <div class="slider_list  owl-carousel">
        <div class="single_slide single_slide_two"
             style="background-image: url(assets/img/banner/banner1_home2.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider__content slider_content_two">
                            <p>Exclusive Offer -10% Off This Week</p>
                            <h2>Live <strong>healthy</strong> with a glass</h2>
                            <h3>of <strong>fruit juice</strong> every day</h3>
                            <h6>Starting at<span>$42.99</span></h6>
                            <div class="slider_btn">
                                <a href="shop.html">Shopping now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slide single_slide_two"
             style="background-image: url(assets/img/banner/banner2_home2.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider__content">
                            <p>Exclusive Offer -10% Off This Week</p>
                            <h2>We <strong>provide</strong> the best</h2>
                            <h3> product <strong> for you </strong></h3>
                            <h6>Starting at <span>$42.99</span></h6>
                            <div class="slider_btn">
                                <a href="shop.html">Shopping now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="shipping_area_two">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="shipping_list d-flex justify-content-between">
                        <div class="single_shipping_box d-flex">
                            <div class="shipping_icon">
                                <img src="assets/img/ship/1.png" alt="shipping icon">
                            </div>
                            <div class="shipping_content">
                                <h6>Free Shipping On Order Over $120</h6>
                                <p>Free shipping on all order</p>
                            </div>
                        </div>
                        <div class="single_shipping_box one d-flex">
                            <div class="shipping_icon">
                                <img src="assets/img/ship/2.png" alt="shipping icon">
                            </div>
                            <div class="shipping_content">
                                <h6>Money Return</h6>
                                <p>Back guarantee under 7 days</p>
                            </div>
                        </div>
                        <div class="single_shipping_box two d-flex">
                            <div class="shipping_icon">
                                <img src="assets/img/ship/3.png" alt="shipping icon">
                            </div>
                            <div class="shipping_content">
                                <h6>Member Discount</h6>
                                <p>Support online 24 hours a day</p>
                            </div>
                        </div>
                        <div class="single_shipping_box d-flex">
                            <div class="shipping_icon">
                                <img src="assets/img/ship/4.png" alt="shipping icon">
                            </div>
                            <div class="shipping_content">
                                <h6>Online Support 24/7</h6>
                                <p>Free shipping on all order</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="features_product features_two pt-90 ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section_title space_2 text-center">
                        <h3> Featured products </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="features_product_active owl-carousel">
                    @foreach($cakes as $ca)
                    <div class="col-lg-2">
                        <div class="single__product">
                            <div class="single_product__inner">
                                <span class="new_badge">{{ $ca->status }}</span>
                                <div class="product_img">
                                    <a href="#">
                                        <img src="{{ asset('upload/user/'. $ca->images->first()->image) }}" alt="">
                                    </a>
                                </div>
                                <div class="product__content text-center">
                                    <div class="produc_desc_info">
                                        <div class="product_title">
                                            <h4><a  href="product-details.html">{{ $ca->name }}</a></h4>
                                        </div>
                                        <div class="product_price">
                                            <p>{{ number_format($ca->price) }}</p>
                                        </div>
                                    </div>
                                    <div class="product__hover">
                                        <ul>
                                            <li><a href="#" v-on:click="addToCart( {{ $ca->id }}, $event)"><i
                                                        class="ion-android-cart"></i></a></li>
                                            <li><a class="cart-fore" href="#" data-toggle="modal" data-target="#my_modal"  title="Quick View" ><i class="ion-android-open"></i></a></li>
                                            <li><a  href="{{ route('cakeDetail', $ca->id) }}"><i class="ion-clipboard"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
          <div class="new_product new_product_three three_bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="section_title space_2 text-left">
                                    <h3>Bestseller Products</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="features_product_active_three owl-carousel">
                                @foreach($cake1 as $best)
                                <div class="col-lg-2">
                                    <div class="single__product">
                                        <div class="single_product__inner">
                                            <span class="new_badge">{{ $best->status }}</span>
                                            <div class="product_img">
                                            <a href="#">
                                                <img src="{{ asset('upload/user/' . $best->images->first()->image) }}" alt="">
                                                </a>
                                            </div>
                                            <div class="product__content text-center">
                                                <div class="produc_desc_info">
                                                    <div class="product_title">
                                                        <h4><a href="product-details.html">{{ $best->name }}</a></h4>
                                                    </div>
                                                    <div class="product_price">
                                                        <p>{{ $best->price }}</p>
                                                    </div>
                                                </div>
                                                <div class="product__hover">
                                                    <ul>
                                                        <li><a href="#"><i class="ion-android-cart"></i></a></li>
                                                       <li><a class="cart-fore" href="#" data-toggle="modal" data-target="#my_modal"  title="Quick View" ><i class="ion-android-open"></i></a></li>
                                                        <li><a href="product-details.html"><i class="ion-clipboard"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<input type="hidden" value="{{ route('api.cart.addToCart') }}" id="add-to-cart">
<input type="hidden" value="{{ route('api.cart.getCart') }}" id="get-cart">
@endsection


@extends('pages.layouts.master2')
@section('content')
<div class="breadcrumb_container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav>
                    <ul>
                        <li>
                            <a href="{{ route('allcake') }}">Home ></a>
                        </li>
                        <li>All cake</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="organic_food_wrapper">
    <div class="shop_wrapper ptb-90">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-8 col-12">
                    <div class="shop_sidebar">
                        <div class="block_categories">
                            <div class="category_top_menu widget">
                                <div class="widget_title">
                                    <h3>categories</h3>
                                </div>
                                <ul class="shop_toggle">
                                <li class="has-sub"><a href="#">Best seller</a>
												</li>
												<li class="has-sub"><a href="#">New cakes</a>
												</li>
												<li class="has-sub"><a href="#">Resstock</a>
												</li>
                                </ul>
                            </div>
                        </div>
                        <div class="search_filters_wrapper">
                           <div class="Compositions widget mb-30">
                            <div class="widget_title">
                                <h3>Properties</h3>
                            </div>
                            <ul>
                                <li>
                                    <input type="checkbox" id="pro1">
                                    <label for="pro1"> Colorful Dress(6)</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="pro2">
                                    <label for="pro2"> Maxi Dress(2)</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="pro3">
                                    <label for="pro3">Midi Dress(4)</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="pro4">
                                    <label for="pro4">Short Dress(7)</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="pro5">
                                    <label for="pro5">Short Sleeve(4)</label>
                                </li>

                            </ul>

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-12">
                <div class="categories_banner">
                    <div class="categories_banner_inner">
                        <img src="{{ asset('assets/img/banner/shop.jpg') }}" alt="">
                    </div>
                    <h3>SHOP</h3>
                </div>
                <div class="tav_menu_wrapper">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-7 col-sm-6">
                            <div class="tab_menu shop_menu">
                                <div class="tab_menu_inner">
                                    <ul class="nav" role="tablist">
                                        <li><a  class="active" data-toggle="tab" href="#shop_active" role="tab" aria-controls="shop_active" aria-selected="true"><i class="fa fa-th" aria-hidden="true"></i></a></li>

                                        <li><a data-toggle="tab" href="#featured_active" role="tab" aria-controls="featured_active" aria-selected="false"><i class="fa fa-list" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                                <div class="search_box search_box_two ">
                            <div class="search_inner search_two">
                                <form action="{{ route('allcake') }}" method="get">
                                @if ($category = Request::input('category'))
                                <input type="hidden" name="search" value="{{ $category }}">
                                @endif
                                    <input name="search" type="text" placeholder="Search our catalog" value="{{ Request::input('search') ? Request::input('search') : '' }}">
                                    <button type="submit"><i class="ion-ios-search"></i></button>
                                </form>
                            </div>
                        </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5 col-sm-6">    
                            <div class="Relevance">
                                <span>Sort by:</span>
                                <div class="dropdown dropdown-shop">
                                <form action="{{ route('allcake') }}" method="get" id="orderby-form">
                                @if ($search = Request::input('search'))
                                <input type="hidden" name="search" value="{{ $search }}">
                                @endif
                                    <select name="orderBy" onchange="document.getElementById('orderby-form').submit()">
                                        <option value="lastest" {{ Request::input('orderBy') == 'lastest' ? 'selected' : '' }}>New cake</option>
                                        <option value="oldest" {{ Request::input('orderBy') == 'oldest' ? 'selected' : '' }}>Old cake</option>
                                        <option value="highest" {{ Request::input('orderBy') == 'highest' ? 'selected' : '' }}>Price, low to high</option>
                                        <option value="lowest" {{ Request::input('orderBy') == 'lowest' ? 'selected' : '' }}>Price, high to low</option>
                                    </select>
                                    </form>
                                    <br>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab_product_wrapper">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="shop_active" >
                            <div class="row">
                                @foreach($cake as $ca)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                    <div class="single__product">
                                        <div class="single_product__inner">
                                            <span class="new_badge">{{ $ca->status }}</span>
                                            <span class="discount_price">{{ $ca->price_sale }}%</span>
                                            <div class="product_img">
                                                <a href="#">
                                                    <img src="{{ asset('upload/user/'. $ca->images->first()->image) }}" alt="">
                                                </a>
                                            </div>
                                            <div class="product__content text-center">
                                                <div class="produc_desc_info">
                                                    <div class="product_title">
                                                        <h4><a href="{{ route('cakeDetail', $ca->id) }}">{{ $ca->name }}</a></h4>
                                                    </div>
                                                    <div class="product_price">
                                                        <p>{{ $ca->price }}</p>
                                                    </div>
                                                </div>
                                                <div class="product__hover">
                                                    <ul>
                                                        <li><a href="#" v-on:click="addToCart( {{ $ca->id }}, $event)"><i class="ion-android-cart"></i></a></li>
                                                        <li><a class="cart-fore" href="#" data-toggle="modal" data-target="#my_modal"  title="Quick View" ><i class="ion-android-open"></i></a></li>

                                                        <li><a href="{{ route('cakeDetail', $ca->id) }}"><i class="ion-clipboard"></i></a></li>
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
    </div>
</div>
<!--- shop_wrapper area end  -->

<!--Brand logo start-->
<div class="brand_logo">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="brand_list_carousel owl-carousel shop_page">
                    <div class="single_brand_logo">
                        <a href="#">
                            <img src="assets/img/brand/1.png" alt="brand logo">
                        </a>
                    </div>
                    <div class="single_brand_logo">
                        <a href="#">
                            <img src="assets/img/brand/2.png" alt="brand logo">
                        </a>
                    </div>
                    <div class="single_brand_logo">
                        <a href="#">
                            <img src="assets/img/brand/3.png" alt="brand logo">
                        </a>
                    </div>
                    <div class="single_brand_logo">
                        <a href="#">
                            <img src="assets/img/brand/4.png" alt="brand logo">
                        </a>
                    </div>
                    <div class="single_brand_logo">
                        <a href="#">
                            <img src="assets/img/brand/5.png" alt="brand logo">
                        </a>
                    </div>
                    <div class="single_brand_logo">
                        <a href="#">
                            <img src="assets/img/brand/1.png" alt="brand logo">
                        </a>
                    </div>
                    <div class="single_brand_logo">
                        <a href="#">
                            <img src="assets/img/brand/2.png" alt="brand logo">
                        </a>
                    </div>
                    <div class="single_brand_logo">
                        <a href="#">
                            <img src="assets/img/brand/3.png" alt="brand logo">
                        </a>
                    </div>
                    <div class="single_brand_logo">
                        <a href="#">
                            <img src="assets/img/brand/4.png" alt="brand logo">
                        </a>
                    </div>
                    <div class="single_brand_logo">
                        <a href="#">
                            <img src="assets/img/brand/5.png" alt="brand logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
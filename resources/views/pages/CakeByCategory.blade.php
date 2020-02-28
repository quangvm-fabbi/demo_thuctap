@extends('pages.layouts.master')
@section('content')
<div class="breadcrumb_container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav>
                    <ul>
                        <li>
                            <a href="{{ route('homepages') }}">Home ></a>
                        </li>
                        <li>Cakes by Category</li>
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
                                <ul class="shop_toggle">
                                @foreach ($categories as $category)
                                    @if (!$category->parent_id)
                                    <li class="has-sub"><a href="#">{{ $category->name }}</a>
                                        <ul class="categorie_sub">
                                        @foreach ($category->categories as $category_child)
                                            <li><a href="{{ route('cakeCategory', $category_child->id) }}">{{ $category_child->name }}</a></li>
                                            @endforeach
                                            
                                        </ul>
                                    </li>
                                    @endif
                                        @endforeach
                                </ul>
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
                                <div class="tab_menu_right">
                                    <p>There are 14 products.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5 col-sm-6">
                            <div class="Relevance">
                                <span>Sort by:</span>
                                <div class="dropdown dropdown-shop">
                                    <select name="drop" id="dropdown">
                                        <option value="1">Relevance</option>
                                        <option value="2">Name, A to Z</option>
                                        <option value="2">Name, Z to A</option>
                                        <option value="2">Price, low to high</option>
                                        <option value="2">Price, high to low</option>
                                    </select>
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
                                                        <h4><a href="product-details.html">{{ $ca->name }}</a></h4>
                                                    </div>
                                                    <div class="product_price">
                                                        <p>{{ $ca->price }}</p>
                                                    </div>
                                                </div>
                                                <div class="product__hover">
                                                    <ul>
                                                        <li><a href="#"><i class="ion-android-cart"></i></a></li>
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
                        <div class="tab-pane fade" id="featured_active" role="tabpanel">
                            @foreach($cake as $ca)
                            <div class="tab_product_bottom_wrapper">
                                <div class="row">
                                    <div class="col-lg-4 col-md-5 col-sm-5">
                                        <div class="single_product__inner inner_shop">
                                            <span class="new_badge">{{ $ca->status }}</span>
                                            <span class="discount_price">{{ $ca->price_sale }}%</span>
                                            <div class="product_img">
                                                <a href="#">
                                                    <img src="{{ asset('upload/user/' . $ca->images->first()->image) }}" alt="">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7">
                                        <div class="product__content text-left">
                                            <div class="produc_desc_info">
                                                <div class="product_title title_shop">
                                                    <h4><a href="product-details.html">{{ $ca->name }}</a></h4>
                                                </div>
                                                <div class="product_price price_shop">
                                                    <p class="regular_price">{{ $ca->price_sale }}</p>
                                                    <p>{{ $ca->price }}</p>
                                                </div>
                                                <div class="product_content_shop">
                                                    <p>{{ $ca->description }}</p>
                                                </div>
                                            </div>
                                            <div class="product__hover hover_shop">
                                                <div class="product_addto_cart">
                                                    <button type="submit">ADD TO CART</button>
                                                </div>
                                                <div class="product_cart_icone">
                                                    <ul>
                                                        <li><a href="#"><i class="ion-android-cart"></i></a></li>
                                                        <li><a class="cart-fore" href="#" data-toggle="modal" data-target="#my_modal"  title="Quick View" ><i class="ion-android-open"></i></a></li>

                                                        <li><a href="{{ route('cakeDetail', $ca->id) }}"><i class="ion-clipboard"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{$cake->links('vendor.pagination.custom')}}
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
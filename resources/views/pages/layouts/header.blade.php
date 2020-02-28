<div class="header_top_bar top_bar_two">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="header_top_inner">
                    <div class="phone">
                        <p><i class="ion-clock"></i>{{ trans('setting.title.pages1') }}</p>
                    </div>
                    <div class="header_top_right">
                        <ul class="header_top_right_inner">
                            <li class="language_wrapper_two">
                                <a href="{{ route('acount') }}">
                                    <span>{{ trans('setting.account') }}<i class="fa fa-angle-down"></i> </span>
                                </a>
                                <ul class="account__name">

                                    @guest
                                        <li><a href="{{ route('login') }}"> {{ __('Login') }}</a></li>
                                        @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                        @endif
                                    @else
                                        <li><a href=""> {{ Auth::user()->name }}</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                        <li><a href=""></a></li>
                                    @endguest
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header_middle middle-two">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="header_middle_wrapper">
                    <div class="header_middle_inner middel_two">
                        <div class="search_box search_box_two ">
                            <div class="search_inner search_two">
                                <form action="#">
                                    <input type="text" placeholder="Search our catalog">
                                    <button type="submit"><i class="ion-ios-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="logo logo_two">
                            <a href="index.html">
                                <img src="{{ asset(config('setting.font_image.logo')) }}" alt="">
                            </a>
                        </div>
                        <div class="mini__cart minicart_two">
                            <div class="mini_cart_inner minicart_inner_two">
                                <div class="cart_icon">
                                    <a href="{{ route('cart.index') }}">
													<span class="cart_icon_inner">
														<i class="ion-android-cart"></i>
														<span class="cart_count" v-text="total">0</span>
													</span>
                                        <span class="item_total" v-text="sumPrice">0</span>
                                    </a>
                                </div>
                                <!--Mini Cart Box-->
                                <div class="mini_cart_box cart_box_two mini_cart_two">
                                    <div class="mini_cart_item" v-for="(cake, key) in cart">
                                        <div class="mini_cart_img">
                                            <a href="#">
                                                <img v-bind:src="cake.image" alt="">
                                                <span class="cart_count" v-text="cake.quanity" ></span>
                                            </a>
                                        </div>
                                        <div class="cart_info cart_info_two">
                                            <h5><a href="product-details.html" v-text="cake.name"></a></h5>
                                            <span class="cart_price" v-text="cake.price * cake.quanity"></span>
                                        </div>
                                        <div class="cart_remove">
                                            <a href=""><i class="zmdi zmdi-delete"></i></a>
                                        </div>
                                    </div>
                                    <div class="price_content">
                                        <div class="cart-total-price cart-total-price_two">
                                            <span class="label">{{ trans('setting.total') }}</span>
                                            <span class="value" v-text="total"></span>
                                        </div>
                                        <div class="cart-total-price cart-total-price_two">
                                            <span class="label">Price</span>
                                            <span class="value" v-text="sumPrice"></span>
                                        </div>
                                    </div>
                                    <div class="min_cart_checkout checkoyt_two">
                                        <a href="checkout.html">{{ trans('setting.checkout') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="header header_bottm bottom_two sticky-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <div class="main_menu_inner">
                    <div class="menu menu_two">
                        <nav>
                            <ul>
                                <li class="active"><a href="index.html">Home <i class=""></i></a>
                                </li>
                                <li class="mega_parent"><a href="{{ route('allcake') }}">{{ trans('setting.cat') }} <i
                                            class="fa fa-angle-down"></i></a>
                                    <ul class="mega_menu">
                                        @foreach ($categories as $category)
                                            @if (!$category->parent_id)
                                                <li class="mega_item">
                                                    <a class="mega_title" href="#">{{ $category->name }}</a>
                                                    <ul>
                                                        @foreach ($category->categories as $category_child)
                                                            <li>
                                                                <a href="{{ route('cakeCategory', $category_child->id) }}">{{ $category_child->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="#">vegetable</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>



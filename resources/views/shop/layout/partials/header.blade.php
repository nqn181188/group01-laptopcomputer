<div class="container-fluid">
    <div class="row">
        <div class="topbar-menu-area">
            <div class="container">
                <div class="topbar-menu left-menu">
                    <ul>
                        <li class="menu-item" >
                            <a title="Hotline: (+123) 456 789" href="#" ><span class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>
                        </li>
                    </ul>
                </div>
                <div class="topbar-menu right-menu">
                    <ul>
                        @if (Session::get('user')==null)
                            <li class="menu-item" ><a title="Register or Login" href="{{ route('login')}}">Login</a></li>
                            <li class="menu-item" ><a title="Register or Login" href="{{ route('register')}}">Register</a></li>
                        @else
                            <li class="menu-item" ><a title="My account" href="{{ route('customer.show',Session::get('user')->id)}}">{{Session::get('user')->firstname}}</a></li>
                            <li class="menu-item" ><a href="{{ route('customer.edit', Session::get('user')->id) }}">Change Profile</a></li>
                            <li class="menu-item" ><a href="{{ route('customer.process-logout')}}">Logout</a></li>
                        @endif
                </div>
            </div>
        </div>

        <div class="container">
            <div class="mid-section main-info-area">

                <div class="wrap-logo-top left-section">
                    <a href="{{route('home')}}" class="link-to-home"><img src="assets/images/logo-top-1.png" alt="mercado"></a>
                </div>

                <div class="wrap-search center-section">
                    <div class="wrap-search-form">
                        <form action="" id="form-search-top" name="form-search-top">
                            <input type="text" name="search" value="" placeholder="Enter the name of the laptop you need to find...">
                            <button form="form-search-top" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                            <div wrap-list-cate">
                                <input type="hidden" name="product-cate" value="0" id="product-cate">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="wrap-icon right-section">
                    <div class="wrap-icon-section wishlist">
                        <a href="#" class="link-direction">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                            <div class="left-info">
                                {{-- <span class="index">0 item</span> --}}
                                <span class="title">Wishlist</span>
                            </div>
                        </a>
                    </div>
                    <div class="wrap-icon-section minicart">
                        <a href="{{route('cart')}}" class="link-direction">
                            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                            <div class="left-info">
                                {{-- <span class="index">4 items</span> --}}
                                <span class="title">
                                   <a href="{{route('cart')}}">CART</a> </span>
                            </div>
                        </a>
                    </div>
                    <div class="wrap-icon-section show-up-after-1024">
                        <a href="#" class="mobile-navigation">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <div class="nav-section header-sticky">
            <div class="primary-nav-section">
                <div class="container">
                    <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
                        <li class="menu-item home-icon">
                            <a href="{{route('home')}}" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('aboutus')}}" class="link-term mercado-item-title">About Us</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('shop')}}" class="link-term mercado-item-title">Shop</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('cart')}}" class="link-term mercado-item-title">Cart</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('checkout')}}" class="link-term mercado-item-title">Checkout</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('contact')}}" class="link-term mercado-item-title">Contact Us</a>
                        </li>																	
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@extends('shop.layout.layout1')
@section('contents')
<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><span><a href="{{ route('home')}}" class="link">home</a></span></li>
            <li class="item-link"><span><a href="{{ route('login')}}" class="link">login</a></span></li>
        </ul>
    </div>
    <div class=" main-content-area">

        <form action="" method="POST">
            @php
            $total = 0;
            @endphp
            @csrf
        <div class="wrap-iten-in-cart">
            <h3 class="box-title">Products Name</h3>
            @if (Session::has('cart'))
            <ul class="products-cart">
               
                @foreach(Session::get('cart') as $item)
                @php
                $total += $item->quantity * $item->price;
                @endphp
                <li class="pr-cart-item">
                    <div class="product-image">
                        <figure><img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}"></figure>
                    </div>
                    <div class="product-name">
                        <a class="link-to-product" href="{{ route('product-detail', $item->id) }}">{{ $item->name }}</a>
                    </div>
                    <div class="price-field produtc-price"><p class="price">{{ $item->price }} đ</p></div>
                    <div class="quantity">
                        <div class="quantity-input" data-id={{ $item->id }}>
                            <input type="text" name="product-quatity" value="{{ $item->quantity }}" data-max="120" pattern="[0-9]*" >									
                            <a class="btn btn-increase" href="#"></a>
                            <a class="btn btn-reduce" href="#"></a>
                        </div>
                    </div>
                    <div class="price-field sub-total"><p class="price">{{ $item->quantity * $item->price }} đ</p></div>
                    <div class="delete">
                        <a href="#" class="btn btn-delete" title="">
                            <span>Delete from your cart</span>
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                </li>
              	@endforeach								
            </ul>
            @endif
        </div>

        <div class="summary">
            <div class="order-summary">
                <h4 class="title-box">Order Summary</h4>
                <p class="summary-info"><span class="title">Subtotal</span><b class="index">{{ $total }} đ</b></p>
                <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                <p class="summary-info total-info "><span class="title">Total</span><b class="index">{{ $total }} đ</b></p>
            </div>
            <div class="checkout-info">
                <label class="checkbox-field">
                    <input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have promo code</span>
                </label>
                <a class="btn btn-checkout" href="{{route('checkout')}}">Check out</a>
                <a class="link-to-shop" href="{{route('shop')}}">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
            </div>
            <div class="update-clear">
                <a class="btn btn-clear" href="#">Clear Shopping Cart</a>
                <a class="btn btn-update" href="#">Update Shopping Cart</a>
            </div>
        </div>

        </form>

    </div><!--end main content area-->
</div><!--end container-->

@endsection
@extends('shop.layout.layout1')
@section('contents')
<<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{ route('home') }}" class="link">home</a></li>
            <li class="item-link"><a href="{{ route('checkout') }}" class="link">checkout</a></li>
        </ul>
    </div>
    <div class=" main-content-area">
        <form action="{{ route('do-checkout') }}" method="post" name="frm-billing">
            @php
            $total = 0;
            @endphp
            @csrf
            <div class="wrap-address-billing">
                <h3 class="box-title">Billing Address</h3>
           
                <p class="row-in-form">
                    <label for="fname">first name:</label>
                </p>
                <p class="row-in-form">
                    <label for="lname">last name:</label>
                </p>
                <p class="row-in-form">
                    <label for="email">Email Addreess:</label>
                </p>
                <p class="row-in-form">
                    <label for="phone">Phone number:</label>
                </p>
                <p class="row-in-form fill-wife">
                    <label for="add">Address:</label>
                </p>
            
            </div>

            <div class="wrap-address-billing">
                <h3 class="box-title">Shipping Address</h3>
            
                <p class="row-in-form">
                    <label for="fname">Ship first name:</label>
                </p>
                <p class="row-in-form">
                    <label for="lname">Ship last name:</label>
                </p>
                <p class="row-in-form">
                    <label for="email">ship email addreess:</label>
                </p>
                <p class="row-in-form">
                    <label for="phone">Ship phone number:</label>
                </p>
                <p class="row-in-form fill-wife">
                    <label for="add">Ship address:</label>
                </p>
            
            </div>
        </form>

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
                        <figure><img src="{{ asset('images/products/' . $item->image) }}" alt="{{ $item->name }}"></figure>
                    </div>
                    <div class="product-name">
                        <a class="link-to-product" href="{{ route('product-detail', $item->id) }}">{{ $item->name }}</a>
                    </div>
                    <div class="price-field produtc-price"><p class="price">{{ $item->price }} đ</p></div>
                    <div class="quantity">
                        <div class="quantity-input" data-id={{ $item->id }}>
                            <input type="text" name="product-quantity" value="{{ $item->quantity }}" data-max="120" pattern="[0-9]*" >									
                            <a class="btn btn-increase" href="#"></a>
                            <a class="btn btn-reduce" href="#"></a>
                        </div>
                    </div>
                    <div class="price-field sub-total"><p class="price">{{ $item->quantity * $item->price }} đ</p></div>
                    <div class="delete">
                        <a href="#" class="btn btn-delete" title="" data-id={{ $item->id }}>
                            <span>Delete from your cart</span>
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                </li>
                  @endforeach								
            </ul>
            @endif
        </div>
    </div><!--end main content area-->
</div><!--end container-->
@endsection

@section('my-scripts')
<script>
    // setup csrf-token cho post method
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.btn-delete').click(function(e){
        e.preventDefault();
        pid = $(this).data("id");
        // alert(id);
        $.ajax({
            type:'GET',
            url:'{{ route('delete-cart-item') }}',
            data:{ pid:pid },
            success:function(data){
                alert('hoàn thành xóa sản phẩm khỏi giỏ hàng');
                window.location='{{ route('viewcart') }}'
            }
        });
    });
   
    $(".quantity-input").on('click', '.btn', function(event) {
        event.preventDefault();
        
        // alert(pid);
        var _this = $(this),
            _input = _this.siblings('input[name=product-quantity]'),
            _current_value = _this.siblings('input[name=product-quantity]').val(),
            _max_value = _this.siblings('input[name=product-quantity]').attr('data-max');
        if(_this.hasClass('btn-reduce')){
            if (parseInt(_current_value, 10) > 1) _input.val(parseInt(_current_value, 10) - 1);
        }else {
            if (parseInt(_current_value, 10) < parseInt(_max_value, 10)) _input.val(parseInt(_current_value, 10) + 1);
        }

        pid = $('.quantity-input').data("id");
        quantity = _input.val();
        $.ajax({
            type:'GET',
            url:'{{ route('change-cart-quantity') }}',
            data:{ pid:pid, quantity:quantity },
            success:function(data){
                window.location='{{ route('viewcart') }}'
            }
        });
    });
</script>
@endsection

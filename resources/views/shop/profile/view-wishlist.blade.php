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

        @if (Session::has('wishlist'))
        <form action="" method="POST">
            @php
            $total = 0;
            @endphp
            @csrf
        <div class="wrap-iten-in-cart">
            <h3 class="box-title">Products Name</h3>
            @if (Session::has('wishlist'))
            <ul class="products-cart">
               
                @foreach(Session::get('wishlist') as $item)
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
                    <div class="price-field produtc-price"><p class="price">${{ $item->price }}</p></div>
                    {{-- <div class="quantity">
                        <div class="quantity-input" data-id={{ $item->id }}>
                            <input type="text" name="product-quantity" value="{{ $item->quantity }}" data-max="120" pattern="[0-9]*" >									
                            <a class="btn btn-increase" href="#"></a>
                            <a class="btn btn-reduce" href="#"></a>
                        </div>
                    </div> --}}
                    <a href="#" class="btn add-to-cart">Add to Cart</a>

                    <div class="delete">
                        <a href="#" class="btn btn-delete" title="" data-id={{ $item->id }}>
                            <span>Delete</span>
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                </li>
              	@endforeach								
            </ul>
            @endif
        </div>
        </form>
        @else
            <div class="card">
                <a href="{{route('shop')}}"><h1>Go shoping now</h1></a>
            </div>
        @endif
        

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
            url:'{{ route('delete-wishlist') }}',
            data:{ pid:pid },
            success:function(data){
                // alert('hoàn thành xóa sản phẩm khỏi giỏ hàng');
                swal("Deleted", "The item has been removed from your wishlist", "warning",{
                    button: "Close"
                });
                // window.location='{{ route('viewcart') }}'
            }
        });
    });
    
    


</script>
@endsection

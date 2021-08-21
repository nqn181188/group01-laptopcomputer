@extends('shop.layout.layout1')
@section('contents')
<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><span><a href="{{ route('home')}}" class="link">home</a></span></li>
            <li class="item-link"><span><a href="{{ route('login')}}" class="link">Wishlist</a></span></li>
        </ul>
    </div>
    <div class=" main-content-area">

        @if ($items!=null)
        <form action="" method="POST">
            {{-- @php
            $total = 0;
            @endphp --}}
            @csrf
        <div class="wrap-iten-in-cart">
            <h3 class="box-title">Wishlist</h3>
            <ul class="products-cart">
               
                {{-- @php
                $total += $item->quantity * $item->price;
                @endphp --}}
                <div class="wrap-iten-in-cart">
                    <ul class="products-cart">
                        @foreach($items as $item)
                        <li class="pr-cart-item">
                            <div class="product-image">
                                <figure><img src="{{ asset('images/products/' . $item->image) }}" alt="{{ $item->name }}"></figure>
                            </div>
                            <div class="product-name">
                                <a class="link-to-product" href="{{ route('product-detail', $item->id) }}">{{ $item->name }}</a>
                            </div>
                            <div class="price-field produtc-price"><p class="price">${{number_format($item->price, 2, '.', ',')}}</p></div>
                            
                            {{-- <a href="#" class="btn add-to-cart add-cart">Add to Cart</a> --}}

                            <div class="delete">
                                <a href="#" class="btn btn-delete" title="" data-id={{ $item->id }}>
                                    <span>Delete from your cart</span>
                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                </a>
                            </div>
                        </li>
                          @endforeach								
                    </ul>
                </div>
                						
            </ul>
        </div>
        </form>
        @else
            <div class="card">
                <a href="{{route('shop')}}"><h5>There are no products in the wishlist</h5></a>
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
    
    $('.add-to-cart').click(function(e) {
        e.preventDefault();     
        var pid = $(this).data("id");

            $.ajax({
                type:'GET',
                url:'{{ route('add-cart') }}',
                data:{ pid:pid, quantity:1 },
                success:function(data){
                    swal("Thanks", "The item has been added to your cart", "success",{
                        button: "Close"
                    });
                }
            
            });
        });


</script>
@endsection

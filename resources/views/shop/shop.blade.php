@extends('shop.layout.layout2')
@section('contents')
<div class="container">
    <div class="container">
        @include('shop.layout.partials.model')
    </div>
    
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><span>SHOP</span></li>
        </ul>
    </div>
    <div class="row">

        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

            <div class="wrap-shop-control">

                <h1 class="shop-title">LAPTOP LIST</h1>

                <div class="wrap-right">

                    <div class="sort-item orderby ">
                        <select name="orderby" class="use-chosen" >
                            <option value="menu_order" selected="selected">Default sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by newness</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                    </div>

                </div>

            </div><!--end wrap shop control-->

            <div class="row">
                <ul class="product-list grid-products equal-container">
                    @foreach ($products as $item)
                    <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                        <div class="product product-style-3 product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{route('product-detail',$item->id)}}" title="{{$item->name}}">
                                    <figure><img src="{{asset('images/products/'.$item->image)}}" width="800" height="800" alt="{{$item->name}}"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <input value="Quick View" class="function-link quickview" type="button" data-target="#quickview" data-toggle="modal" data-id_product ="{{$item->id}}">
                                    {{-- <a href="#" class="function-link">quick view</a> --}}
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name" style="font-weight: bold"><span>{{$item->name}}</span></a>
                                <div class="wrap-price"><span class="product-price">${{$item->price}}</span></div>
                                <a href="#" class="btn add-to-cart">Add To Cart</a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    
                </ul>

            </div>

            <div class="wrap-pagination-info">
                <ul class="page-numbers">
                        <li><a href="{{ $products->url($products->url(1))}}" class="page-number-item next-link">First</a></li>
                        <li><a href="{{ $products->previousPageUrl() }}" class="page-number-item next-link">Previous</a></li>
                        @for($i=1; $i<=$products->lastPage(); $i++) 
                            <li><a class="page-number-item {{$i==$products->currentPage()?'current':''}}" href="{{$products->url($i)}}" >{{$i}}</a></li>
                        @endfor
                        <li><a class="page-number-item next-link" href="{{ $products->nextPageUrl() }}" >Next</a></li>
                        <li><a href="{{ $products->url($products->lastPage())}}" class="page-number-item next-link">Last</a></li>
                </ul>
                <p class="result-count">Showing {{($products->currentPage()-1)*$paginate+1}}-{{($products->currentPage()-1)*$paginate+$products->count()}} of {{$products->total()}}</p>
            </div>
        </div><!--end main products area-->
        @include('shop.layout.partials.sidebar')

    </div><!--end row-->
</div><!--end container-->
       

@endsection
@section('my-scripts')
    <script type="text/javascript">
        // $.ajaxSetup({
		// 	headers:{
		// 		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		// 	}
		// });
        $('.quickview').click(function(){
            var product_id = $(this).data("id_product");
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{route('quick-view')}}',
                type: 'post',
                dataType: "JSON",
                data: {product_id:product_id, _token:_token},
                success:function(data){
                    $('#quickview_name').html(data.name);
                    $('#quickview_price').html(data.price);
                    $('#quickview_cpu').html(data.cpu);
                    $('#quickview_image').html(data.image);
                    $('#quickview_ram').html(data.ram);
                    $('#quickview_screensize').html(data.screensize);
                    $('#quickview_gcard').html(data.gcard);
                    $('#quickview_hd').html(data.hd);
                    $('#quickview_dimension').html(data.dimension);
                    $('#quickview_weight').html(data.weight);
                    $('#quickview_os').html(data.os);
                    $('#quickview_releaseyear').html(data.releaseyear);
                    $('#quickview_avail').html(data.avail);
                }
            });
        });

    </script>
@endsection
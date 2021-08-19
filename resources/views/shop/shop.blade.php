@extends('shop.layout.layout1')
@section('contents')
@include('shop.layout.partials.model')
<div class="container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><span>SHOP</span></li>
        </ul>
    </div>
    <div class="row">
        <form id="sort-item">
        @include('shop.layout.partials.sidebar')
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

            <div class="wrap-shop-control">

                <h1 class="shop-title">LAPTOP LIST</h1>

                <div class="wrap-right">

                    
                        <div class="sort-item orderby">
                            <select name="orderby" class="use-chosen">
                                @if (isset($page))
                                <input type="hidden" value={{$page}} name=page>
                                @endif
                                <option value="featured"{{$orderby=='featured'?'selected':''}}>Default sorting</option>
                                <option value="price-asc" {{$orderby=='price-asc'?'selected':''}}>Sort by price: Low to High</option>
                                <option value="price-desc"{{$orderby=='price-desc'?'selected':''}}>Sort by price: High to Low</option>
                            </select>
                        </div>
                        <div class="sort-item product-per-page">
                                <select name="post_per_page" class="use-chosen">
                                <option value="6" {{$paginate=='9'?'selected':''}}>6 per page</option>
                                <option value="12" {{$paginate=='12'?'selected':''}}>12 per page</option>
                                <option value="18" {{$paginate=='18'?'selected':''}}>18 per page</option>
                                <option value="24" {{$paginate=='24'?'selected':''}}>24 per page</option>
                                <option value="36" {{$paginate=='36'?'selected':''}}>36 per page</option>
                            </select>
                        </div>
                        <input type="hidden" value="{{$products->currentPage()}}" name="page">
                    </form>

                </div>

            </div><!--end wrap shop control-->

            <div class="row">
                <ul class="product-list grid-products equal-container">
                    @foreach ($products as $item)
                    <form>
                    @csrf
                    <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                        <div class="product product-style-3 product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{route('product-detail',$item->id)}}" title="{{$item->name}}">
                                    <figure><img src="{{asset('images/products/'.$item->image)}}" width="800" height="800" alt="{{$item->name}}"></figure>
                                </a>
                                
                                <div class="group-flash">
                                    @if ($item->featured)
                                    <span class="flash-item sale-label">HOT</span>
                                    @endif
                                </div>
                                <div class="wrap-btn">
                                    <input value="Quick View" class="function-link quickview" type="button" data-target="#quickview" data-toggle="modal" data-product_id ="{{$item->id}}" name="add-to-cart">
                                    {{-- <a href="#" class="function-link">quick view</a> --}}
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name" style="font-weight: bold"><span>{{$item->name}}</span></a>
                                <div class="star-rating">
                                    <span class="width-80-percent">Rated <strong class="rating">4</strong> out of 5</span>
                                </div>
                                <div class="wrap-price"><span class="product-price">${{number_format($item->price, 0, '.', ',')}}</span></div>
                                <a href="#" class="btn add-to-cart" data-id="{{ $item->id }}">Add To Cart</a>
                                {{-- <button type="button" class="btn add-to-cart" name="add-cart">Add To Cart</button> --}}
                            </div>
                        </div>
                    </li>
                    </form>
                    @endforeach
                    
                </ul>
            </div>

            <div class="wrap-pagination-info">
                <ul class="page-numbers">
                    @if ($products->currentPage()>1)
                        <li><a href="{{ request()->fullUrlWithQuery(['page' => 1]) }} " class="page-number-item next-link">First</a></li>
                        <li><a href="{{ request()->fullUrlWithQuery(['page' => $products->currentPage()-1])}}" class="page-number-item next-link">Previous</a></li>
                    @endif
                    @for($i=1; $i<=$products->lastPage(); $i++) 
                        <li><a class="page-number-item {{$i==$products->currentPage()?'current':''}}" href="{{ request()->fullUrlWithQuery(['page' => $i])}}">{{$i}}</a></li>
                    @endfor
                    @if ($products->currentPage()<$products->lastPage())
                        <li><a class="page-number-item next-link" href="{{ request()->fullUrlWithQuery(['page' => $products->currentPage()+1])}}" >Next</a></li>
                        <li><a href="{{ request()->fullUrlWithQuery(['page' => ceil($products->total()/$paginate)])}}" class="page-number-item next-link">Last</a></li>
                    @endif
                </ul>
                <p class="result-count">Showing {{($products->currentPage()-1)*$paginate+1}}-{{($products->currentPage()-1)*$paginate+$products->count()}} of {{$products->total()}}</p>
            </div>
        </div><!--end main products area-->
        {{-- @include('shop.layout.partials.sidebar') --}}

    </div><!--end row-->
</div><!--end container-->
       

@endsection
@section('my-scripts')

    <script type="text/javascript">
   
        $.ajaxSetup({
			headers:{
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
     
        $('.quickview').click(function(){
            var product_id = $(this).data("product_id");
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
        $(function(){
            $('.use-chosen').change(function(){
                $('#sort-item').submit();
            });
        });
        $('.add-to-cart').click(function(e) {
        e.preventDefault();     
        //quantity = $('#product-quantity').val();
        //pid = "{{ $item->id }}";
        var pid = $(this).data("id");

        $.ajax({
            type:'GET',
            url:'{{ route('add-cart') }}',
            data:{ pid:pid, quantity:1 },
            success:function(data){
                window.location='{{ route('shop') }}'  
            }
           
        });
    });
    
    </script>
@endsection
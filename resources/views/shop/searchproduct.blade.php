@extends('shop.layout.layout1')
@section('contents')
<div class="container">
    @include('shop.layout.partials.model')
    @include('shop.layout.partials.alert')

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><span>Search Product</span></li>
        </ul>
    </div>
    <div class="row">

        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

            <div class="banner-shop">
                <a href="#" class="banner-link">
                    <figure><img src="assets/images/shop-banner.jpg" alt=""></figure>
                </a>
            </div>

            <div class="wrap-shop-control">

                <h1 class="shop-title">Search product</h1>

                <div class="wrap-right">
                    <form id="sort-item">
                        <input type="hidden" value="{{$searchname}}" name="search"> 
                        <div class="sort-item orderby">
                            <select name="orderby" class="use-chosen" >
                                <option value="menu_order"{{$orderby=='menu_order'?'selected':''}}>Default sorting</option>
                                <option value="price-asc" {{$orderby=='price-asc'?'selected':''}}>Sort by price: Low to High</option>
                                <option value="price-desc"{{$orderby=='price-desc'?'selected':''}}>Sort by price: High to Low</option>
                            </select>
                        </div>
    
                        <div class="sort-item product-per-page">
                                <select name="post_per_page" class="use-chosen" >
                                <option value="6" {{$paginate=='9'?'selected':''}}>6 per page</option>
                                <option value="12" {{$paginate=='12'?'selected':''}}>12 per page</option>
                                <option value="18" {{$paginate=='18'?'selected':''}}>18 per page</option>
                                <option value="24" {{$paginate=='24'?'selected':''}}>24 per page</option>
                                <option value="36" {{$paginate=='36'?'selected':''}}>36 per page</option>
                            </select>
                        </div>
                        <input type="hidden" value="{{$searchproducts->currentPage()}}" name="page">
                    </form>
                </div>

            </div><!--end wrap shop control-->

            <div class="row">

                <ul class="product-list grid-products equal-container">
                    @foreach ($searchproducts as $item)
                    <form>
                    @csrf
                    <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                        <div class="product product-style-2 product-style-3 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{route('product-detail',$item->id)}}" title="{{$item->name}}">
                                    <figure><img src="{{asset('images/products/'.$item->image)}}" alt="{{$item->name}}"></figure>
                                </a>
                                <div class="group-flash">
                                    @if ($item->featured)
                                    <span class="flash-item sale-label">HOT</span>
                                    @endif
                                </div>
                                <div class="wrap-btn">
                                    <input value="Quick View" class="function-link quickview" type="button" data-target="#quickview" data-toggle="modal" data-product_id="{{$item->id}}">
                                    {{-- <a href="#" class="function-link">quick view</a> --}}
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>{{$item->name}}</span></a>
                                <div class="star-rating">
                                    <span class="width-80-percent">Rated <strong class="rating">4</strong> out of 5</span>
                                </div>
                                <div class="wrap-price"><span class="product-price">${{number_format($item->price, 2, '.', ',')}}</span></div>
                                <a class="btn add-to-cart add-cart" data-id="{{$item->id}}">Add To Cart</a>
                            </div>
                        </div>
                    </li>
                    </form>
                    @endforeach
                    
                    

                </ul>

            </div>

            <div class="wrap-pagination-info">
                <ul class="page-numbers">
                        @if ($searchproducts->currentPage()>1)
                        <li><a href="{{ request()->fullUrlWithQuery(['page' => 1]) }} " class="page-number-item next-link">First</a></li>
                        <li><a href="{{ request()->fullUrlWithQuery(['page' => $searchproducts->currentPage()-1])}}" class="page-number-item next-link">Previous</a></li>
                        @endif
                        @for($i=1; $i<=$searchproducts->lastPage(); $i++) 
                            <li><a class="page-number-item {{$i==$searchproducts->currentPage()?'current':''}}" href="{{ request()->fullUrlWithQuery(['page' => $i])}}">{{$i}}</a></li>
                        @endfor
                        @if ($searchproducts->currentPage()<$searchproducts->lastPage())
                        <li><a class="page-number-item next-link" href="{{ request()->fullUrlWithQuery(['page' => $searchproducts->currentPage()+1])}}" >Next</a></li>
                        <li><a href="{{ request()->fullUrlWithQuery(['page' => ceil($searchproducts->total()/$paginate)])}}" class="page-number-item next-link">Last</a></li>

                        @endif
                </ul>
                <p class="result-count">Showing {{($searchproducts->currentPage()-1)*$paginate+1}}-{{($searchproducts->currentPage()-1)*$paginate+$searchproducts->count()}} of {{$searchproducts->total()}}</p>
            </div>
        </div><!--end main products area-->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
            <div class="widget widget-our-services ">
                <div class="widget-content">
                    <ul class="our-services">

                        <li class="service">
                            <a class="link-to-service" href="#">
                                <i class="fa fa-truck" aria-hidden="true"></i>
                                <div class="right-content">
                                    <b class="title">Free Shipping</b>
                                    <span class="subtitle">On Oder Over $99</span>
                                    <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                </div>
                            </a>
                        </li>

                        <li class="service">
                            <a class="link-to-service" href="#">
                                <i class="fa fa-gift" aria-hidden="true"></i>
                                <div class="right-content">
                                    <b class="title">Special Offer</b>
                                    <span class="subtitle">Get a gift!</span>
                                    <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                </div>
                            </a>
                        </li>

                        <li class="service">
                            <a class="link-to-service" href="#">
                                <i class="fa fa-reply" aria-hidden="true"></i>
                                <div class="right-content">
                                    <b class="title">Order Return</b>
                                    <span class="subtitle">Return within 7 days</span>
                                    <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!-- Categories widget-->

            <div class="widget mercado-widget widget-product">
                <h2 class="widget-title">Featured Product</h2>
                <div class="widget-content">
                    <ul class="products">
                        @foreach ($featuredProduct as $item)
                        <li class="product-item">
                            <div class="product product-widget-style">
                                <div class="thumbnnail">
                                    <a href="{{route('product-detail',$item->id)}}" title="{{$item->name}}">
                                        <figure><img src="{{asset('images/products/'.$item->image)}}" alt="{{$item->name}}"></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="{{route('product-detail',$item->id)}}" class="product-name"><span>{{$item->name}}</span></a>
                                    <div class="wrap-price"><span class="product-price">${{number_format($item->price, 2, '.', ',')}}</span></div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div><!--end sitebar-->
        {{-- <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
            <div class="widget mercado-widget categories-widget">
                <h2 class="widget-title">All Categories</h2>
                <div class="widget-content">
                    <ul class="list-category">
                        <li class="category-item has-child-cate">
                            <a href="#" class="cate-link">Fashion & Accessories</a>
                            <span class="toggle-control">+</span>
                            <ul class="sub-cate">
                                <li class="category-item"><a href="#" class="cate-link">Batteries (22)</a></li>
                                <li class="category-item"><a href="#" class="cate-link">Headsets (16)</a></li>
                                <li class="category-item"><a href="#" class="cate-link">Screen (28)</a></li>
                            </ul>
                        </li>
                        <li class="category-item has-child-cate">
                            <a href="#" class="cate-link">Furnitures & Home Decors</a>
                            <span class="toggle-control">+</span>
                            <ul class="sub-cate">
                                <li class="category-item"><a href="#" class="cate-link">Batteries (22)</a></li>
                                <li class="category-item"><a href="#" class="cate-link">Headsets (16)</a></li>
                                <li class="category-item"><a href="#" class="cate-link">Screen (28)</a></li>
                            </ul>
                        </li>
                        <li class="category-item has-child-cate">
                            <a href="#" class="cate-link">Digital & Electronics</a>
                            <span class="toggle-control">+</span>
                            <ul class="sub-cate">
                                <li class="category-item"><a href="#" class="cate-link">Batteries (22)</a></li>
                                <li class="category-item"><a href="#" class="cate-link">Headsets (16)</a></li>
                                <li class="category-item"><a href="#" class="cate-link">Screen (28)</a></li>
                            </ul>
                        </li>
                        <li class="category-item">
                            <a href="#" class="cate-link">Tools & Equipments</a>
                        </li>
                        <li class="category-item">
                            <a href="#" class="cate-link">Kid’s Toys</a>
                        </li>
                        <li class="category-item">
                            <a href="#" class="cate-link">Organics & Spa</a>
                        </li>
                    </ul>
                </div>
            </div><!-- Categories widget-->

            <div class="widget mercado-widget filter-widget brand-widget">
                <h2 class="widget-title">Brand</h2>
                <div class="widget-content">
                    <ul class="list-style vertical-list list-limited" data-show="6">
                        <li class="list-item"><a class="filter-link active" href="#">Fashion Clothings</a></li>
                        <li class="list-item"><a class="filter-link " href="#">Laptop Batteries</a></li>
                        <li class="list-item"><a class="filter-link " href="#">Printer & Ink</a></li>
                        <li class="list-item"><a class="filter-link " href="#">CPUs & Prosecsors</a></li>
                        <li class="list-item"><a class="filter-link " href="#">Sound & Speaker</a></li>
                        <li class="list-item"><a class="filter-link " href="#">Shop Smartphone & Tablets</a></li>
                        <li class="list-item default-hiden"><a class="filter-link " href="#">Printer & Ink</a></li>
                        <li class="list-item default-hiden"><a class="filter-link " href="#">CPUs & Prosecsors</a></li>
                        <li class="list-item default-hiden"><a class="filter-link " href="#">Sound & Speaker</a></li>
                        <li class="list-item default-hiden"><a class="filter-link " href="#">Shop Smartphone & Tablets</a></li>
                        <li class="list-item"><a data-label='Show less<i class="fa fa-angle-up" aria-hidden="true"></i>' class="btn-control control-show-more" href="#">Show more<i class="fa fa-angle-down" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div><!-- brand widget-->

            <div class="widget mercado-widget filter-widget price-filter">
                <h2 class="widget-title">Price</h2>
                <div class="widget-content">
                    <div id="slider-range"></div>
                    <p>
                        <label for="amount">Price:</label>
                        <input type="text" id="amount" readonly>
                        <button class="filter-submit">Filter</button>
                    </p>
                </div>
            </div><!-- Price-->

            <div class="widget mercado-widget filter-widget">
                <h2 class="widget-title">Color</h2>
                <div class="widget-content">
                    <ul class="list-style vertical-list has-count-index">
                        <li class="list-item"><a class="filter-link " href="#">Red <span>(217)</span></a></li>
                        <li class="list-item"><a class="filter-link " href="#">Yellow <span>(179)</span></a></li>
                        <li class="list-item"><a class="filter-link " href="#">Black <span>(79)</span></a></li>
                        <li class="list-item"><a class="filter-link " href="#">Blue <span>(283)</span></a></li>
                        <li class="list-item"><a class="filter-link " href="#">Grey <span>(116)</span></a></li>
                        <li class="list-item"><a class="filter-link " href="#">Pink <span>(29)</span></a></li>
                    </ul>
                </div>
            </div><!-- Color -->

            <div class="widget mercado-widget filter-widget">
                <h2 class="widget-title">Size</h2>
                <div class="widget-content">
                    <ul class="list-style inline-round ">
                        <li class="list-item"><a class="filter-link active" href="#">s</a></li>
                        <li class="list-item"><a class="filter-link " href="#">M</a></li>
                        <li class="list-item"><a class="filter-link " href="#">l</a></li>
                        <li class="list-item"><a class="filter-link " href="#">xl</a></li>
                    </ul>
                    <div class="widget-banner">
                        <figure><img src="assets/images/size-banner-widget.jpg" width="270" height="331" alt=""></figure>
                    </div>
                </div>
            </div><!-- Size -->

            <div class="widget mercado-widget widget-product">
                <h2 class="widget-title">Popular Products</h2>
                <div class="widget-content">
                    <ul class="products">
                        <li class="product-item">
                            <div class="product product-widget-style">
                                <div class="thumbnnail">
                                    <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                        <figure><img src="assets/images/products/digital_01.jpg" alt=""></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                    <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                </div>
                            </div>
                        </li>

                        <li class="product-item">
                            <div class="product product-widget-style">
                                <div class="thumbnnail">
                                    <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                        <figure><img src="assets/images/products/digital_17.jpg" alt=""></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                    <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                </div>
                            </div>
                        </li>

                        <li class="product-item">
                            <div class="product product-widget-style">
                                <div class="thumbnnail">
                                    <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                        <figure><img src="assets/images/products/digital_18.jpg" alt=""></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                    <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                </div>
                            </div>
                        </li>

                        <li class="product-item">
                            <div class="product product-widget-style">
                                <div class="thumbnnail">
                                    <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                        <figure><img src="assets/images/products/digital_20.jpg" alt=""></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                    <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div><!-- brand widget-->

        </div><!--end sitebar--> --}}

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
                type: 'POST',
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
        
        $('.add-cart').click(function(e) {
        e.preventDefault();     
        var pid = $(this).data("id");

            $.ajax({
                type:'GET',
                url:'{{ route('add-cart') }}',
                data:{ pid:pid, quantity:1 },
                success:function(data){
                    swal("Successfully Added", "The item has been added to your cart", "success",{
                        button: "Close"
                    });
                }
            
            });
        });
    </script>
@endsection
@extends('shop.layout.layout1')
@section('contents')
<div class="container">
    @include('shop.layout.partials.model')
</div>
<div class="container">
    <!--MAIN SLIDE-->
    <div class="wrap-main-slide">
        <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
            <div class="item-slide">
                <img src="images/slideshow1.jpg" alt="" class="img-slide">
                <div class="slide-info slide-1">
                    <h2 class="f-title">Latest Model <b>HP <i class="fa fa-laptop" aria-hidden="true"></i></b></h2>
                    <span class="subtitle">New Model HP Laptop with 11th Generation Processor are available</span>
                    <p class="sale-info">Stating at: <span class="price">$600</span></p>
                    <form action="{{route('search-product')}}" id="search-banner-hp">
                        <a id="banner-hp" class="btn-link">Shop Now</a>
                        <input type="hidden" name="search" value="hp">
                    </form>
                    
                </div>
            </div>
            <div class="item-slide">
                <img src="images/slideshow2.jpg" alt="" class="img-slide">
                <div class="slide-info slide-2">
                    <h2 class="f-title">Free Shipping</h2>
                    
                    <p class="discount-code">Use Code: #freeship</p>
                    <h4 class="s-title">Get Free</h4>
                    <p class="s-subtitle">TRansparent Bra Straps</p>
                </div>
            </div>
            <div class="item-slide">
                <img src="images/slideshow3.jpg" alt="" class="img-slide">
                <div class="slide-info slide-3">
                    <h2 class="f-title">MacBook Air <b>Power. It’s in the Air.</b></h2>
                    <span class="f-subtitle">Supercharged by the Apple M1 chip</span>
                    <p class="sale-info">Stating at: <b class="price">$1200.00</b></p>
                    <form action="{{route('search-product')}}" id="search-banner-mac">
                        <a id="banner-mac" class="btn-link">Shop Now</a>
                        <input type="hidden" name="search" value="macbook">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--BANNER-->
    <div class="wrap-banner style-twin-default">
        <div class="banner-item">
            <a href="#" class="link-banner banner-effect-1">
                <figure><img src="images/banner1.jpg" alt="" width="580" height="190"></figure>
            </a>
        </div>
        <div class="banner-item">
            <a href="#" class="link-banner banner-effect-1">
                <figure><img src="images/banner2.jpg" alt="" width="580" height="190"></figure>
            </a>
        </div>
    </div>
    <!--On Sale-->
    <div class="wrap-show-advance-info-box style-1 has-countdown">
        <h3 class="title-box">FEATURED PRODUCTS</h3>
        {{-- <div class="wrap-countdown mercado-countdown" data-expire="2020/12/12 12:34:56"></div> --}}
        <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
            @foreach ($featuredProduct as $item)
            <form action="" method="get">
            @csrf
            <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                    <a href="{{route('product-detail',$item->id)}}" title="{{$item->name}}">
                        <figure><img src="{{asset('images/products/'.$item->image)}}" width="800" height="800" alt="{{$item->name}}"></figure>
                    </a>
                    <div class="group-flash">
                        <span class="flash-item sale-label">HOT</span>
                    </div>
                    <div class="wrap-btn">
                        <input value="Quick View" class="function-link quickview" type="button" data-target="#quickview" data-toggle="modal" data-id_product ="{{$item->id}}">
                        {{-- <button class="function-link quickview" type="button" data-target="#quickview" data-toggle="modal" data-product_id="{{$item->id}}">quick view</button> --}}
                        {{-- <a class="function-link quickview" type="button" data-target="#quickview" data-toggle="modal" data-product_id="{{$item->id}}">quick view</a> --}}
                    </div>
                </div>
                <div class="product-info">
                    <a href="{{route('product-detail',$item->id)}}" class="product-name"><span>{{$item->name}}</span></a>
                    <div class="star-rating">
                        <span class="width-80-percent">Rated <strong class="rating">4</strong> out of 5</span>
                    </div>
                    <div class="wrap-price"><span class="product-price">${{number_format($item->price, 0, '.', ',')}}</span></div>
                </div>
            </div>
            </form>
            @endforeach
        </div>
    </div>

    <!--Latest Products-->
    <div class="wrap-show-advance-info-box style-1">
        <h3 class="title-box">Latest Products</h3>
        <div class="wrap-top-banner">
            <a href="#" class="link-banner banner-effect-2">
                <figure><img src="images/lastestbanner.jpg" width="1170" height="240" alt=""></figure>
            </a>
        </div>
        <div class="wrap-products">
            <div class="wrap-product-tab tab-style-1">						
                <div class="tab-contents">
                    <div class="tab-content-item active" id="">
                        <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                            @foreach ($lastestProduct as $item)
                            <form action="">
                            @csrf
                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{route('product-detail',$item->id)}}" title="{{$item->name}}">
                                        <figure><img src="{{asset('images/products/'.$item->image)}}" width="800" height="800" alt="{{$item->name}}"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item new-label">new</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <input value="Quick View" class="function-link quickview" type="button" data-target="#quickview" data-toggle="modal"  name="add-to-cart" data-id_product ="{{$item->id}}">
                                        {{-- <a href="#" class="function-link">quick view</a> --}}
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="{{route('product-detail',$item->id)}}" class="product-name"><span>{{$item->name}}</span></a>
                                    <div class="wrap-price"><span class="product-price">${{number_format($item->price, 0, '.', ',')}}</span></div>
                                </div>
                                <!-- Button to Open the Modal -->
                            </div>
                            </form>
                            @endforeach
                        </div>
                        
                    </div>							
                </div>
            </div>
        </div>
    </div>

    <!--Product Categories-->
    <div class="wrap-show-advance-info-box style-1">
        <h3 class="title-box">Brand Categories</h3>
        <div class="wrap-top-banner">
            <a href="#" class="link-banner banner-effect-2">
                <figure><img src="images/productcategory2.png" width="1170" height="240" alt=""></figure>
            </a>
        </div>
        <div class="wrap-products">
            <div class="wrap-product-tab tab-style-1">
                <div class="tab-control">
                    @foreach ($brands as $brand)
                    <a href="#{{$brand->brand}}" class="tab-control-item {{$brand->brand=='Acer'?'active':''}}"><img style="border : 1px solid rgb(252, 252, 252); border-radius:20px" src="{{asset('images/brands/'.$brand->image)}}" alt="{{$brand->name}}"></a>
                    @endforeach
                    
                </div>
                <div class="tab-contents">
                    @foreach ($brands as $brand)
                    <div class="tab-content-item {{$brand->brand=='Acer'?'active':''}}" id="{{$brand->brand}}">
                        <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                            @foreach ($products as $item)
                            @if ($item->brand_id==$brand->id)
                            <form>
                                @csrf
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('product-detail',$item->id)}}" title="{{$item->name}}">
                                            <figure><img src="{{asset('images/products/'.$item->image)}}" width="800" height="800" alt="{{$item->name}}"></figure>
                                        </a>
                                        <div class="wrap-btn">
                                            <input value="Quick View" class="function-link quickview" type="button" data-target="#quickview" data-toggle="modal"  name="add-to-cart" data-id_product ="{{$item->id}}">
                                            {{-- <a href="#" class="function-link">quick view</a> --}}
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('product-detail',$item->id)}}" class="product-name"><span>{{$item->name}}</span></a>
                                        <div class="wrap-price"><span class="product-price">${{number_format($item->price, 0, '.', ',')}}</span></div>
                                    </div>
                                </div>
                            </form>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('my-scripts')
    <script type="text/javascript">
        $.ajaxSetup({
			headers:{
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
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
                    $('#quickview_gallery').html(data.gallery);
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
        $('#banner-hp').click(function(){
            $('#search-banner-hp').submit();
        })
        $('#banner-mac').click(function(){
            $('#search-banner-mac').submit();
        })
    </script>
@endsection
{{-- @section('my-scripts')
@if (Session::has('success_login'))
<script>
    swal("Welcome to Laptop Computer","{!! Session::get('success_login') !!}", "success",{
        button: "OK"
    });
</script>
@endif

@if (Session::has('success_logout'))
<script>
    swal("Welcome to Laptop Computer","{!! Session::get('success_logout') !!}", "success",{
        button: "OK"
    });
</script>
@endif
@endsection --}}
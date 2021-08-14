@extends('shop.layout.layout1')
@section('contents')
<div class="container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><span>detail</span></li>
        </ul>
    </div>
    <div class="row">

        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
            <div class="wrap-product-detail">
                <div class="detail-media">
                    <div class="product-gallery">
                      <ul class="slides">
                            <li data-thumb="{{asset('images/products/'.$product->image)}}">
                            <img src="{{asset('images/products/'.$product->image)}}" />
                        </li>

                        <li data-thumb="{{asset('assets/images/products/digital_17.jpg')}}">
                            <img src="{{asset('assets/images/products/digital_17.jpg')}}" alt="product thumbnail" />
                        </li>

                        <li data-thumb="{{asset('assets/images/products/digital_15.jpg')}}">
                            <img src="{{asset('assets/images/products/digital_15.jpg')}}" alt="product thumbnail" />
                        </li>

                        <li data-thumb="{{asset('assets/images/products/digital_02.jpg')}}">
                            <img src="{{asset('assets/images/products/digital_02.jpg')}}" alt="product thumbnail" />
                        </li>

                        <li data-thumb="{{asset('assets/images/products/digital_08.jpg')}}">
                            <img src="{{asset('assets/images/products/digital_08.jpg')}}" alt="product thumbnail" />
                        </li>

                        <li data-thumb="{{asset('assets/images/products/digital_10.jpg')}}">
                            <img src="{{asset('assets/images/products/digital_10.jpg')}}" alt="product thumbnail" />
                        </li>

                        <li data-thumb="{{asset('assets/images/products/digital_12.jpg')}}">
                            <img src="{{asset('assets/images/products/digital_12.jpg')}}" alt="product thumbnail" />
                        </li>

                        <li data-thumb="{{asset('assets/images/products/digital_14.jpg')}}">
                            <img src="{{asset('assets/images/products/digital_14.jpg')}}" alt="product thumbnail" />
                        </li>
                      </ul>
                    </div>
                </div>
                <div class="detail-info">
                    <div class="star-rating">
                        <span class="width-80-percent">Rated <strong class="rating">4</strong> out of 5</span>
                    </div>
                    <h2 class="product-name">{{$product->name}}</h2>
                    <div class="short-desc">
                        <ul>
                            <li>CPU : {{$product->cpu}}</li>
                            <li>RAM : {{$product->amountofram}} {{$product->typeofram}}</li>
                            <li>Hard Drive : {{$product->hdcapacity}} {{$product->hdtype}} </li>
                            <li>Screen Size : {{$product->screensize}}</li>
                            <li>Graphic Card : {{str_contains($product->gcard,'Intel Iris Xe Graphics')||str_contains($product->gcard,'Intel UHD Graphics')?'Onboard':''}}{{$product->gcard}}</li>
                            <li>Dimension : {{$product->width}} x {{$product->depth}} x {{$product->height}} (mm)</li>
                            <li>Weight : {{$product->weight}}</li>
                            <li>OS : {{$product->os}}</li>
                            <li>Release Year : {{$product->releaseyear}}</li>
                        </ul>
                    </div>
                    <div class="wrap-price"><span class="product-price">${{number_format($product->price, 0, '.', ',')}}</span></div>
                    <div class="stock-info in-stock">
                        <p class="availability">Availability: <b>{{$product->quantity>0?'In Stock':'Out Of Stock'}}</b></p>
                    </div>
                    <div class="quantity">
                        <span>Quantity:</span>
                        <div class="quantity-input">
                            <input type="text" name="product-quatity" id="product-quantity" value="1" data-max="9" pattern="[0-9]*" >
                            
                            <a class="btn btn-reduce" href="#"></a>
                            <a class="btn btn-increase" href="#"></a>
                        </div>
                    </div>
                    <div class="wrap-butons">
                        <a href="#" class="btn add-to-cart">Add to Cart</a>
                        <div class="wrap-btn">
                            <a href="#" class="btn btn-compare">Add Compare</a>
                            <a href="#" class="btn btn-wishlist">Add Wishlist</a>
                        </div>
                    </div>
                </div>
                <div class="advance-info">
                    <div class="tab-control normal">
                        <a href="#description" class="tab-control-item active">description</a>
                        <a href="#add_infomation" class="tab-control-item">Tech Specs</a>
                        <a href="#review" class="tab-control-item">Reviews</a>
                    </div>
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="description">
                            {!!$product->description!!}
                        </div>
                        <div class="tab-content-item " id="add_infomation">
                            <table class="shop_attributes">
                                <tbody>
                                    <tr>
                                        <th>CPU</th><td>{{$product->cpu}}</td>
                                    </tr>
                                    <tr>
                                        <th>RAM</th><td>{{$product->amountofram}} GB {{$product->typeofram}}</td>
                                    </tr>
                                    <tr>
                                        <th>Hard Drive</th><td>{{$product->hdtype}} {{$product->hdcapacity}} GB </td>
                                    </tr>
                                    <tr>
                                        <th>Screen size</th><td>{{$product->screensize}}"</td>
                                    </tr>
                                    <tr>
                                        <th>Graphic Card</th><td>{{$product->gcard}}</td>
                                    </tr>
                                    <tr>
                                        <th>Width</th><td>{{$product->width}} (mm)</td>
                                    </tr>
                                    <tr>
                                        <th>Depth</th><td>{{$product->depth}} (mm)</td>
                                    </tr>
                                    <tr>
                                        <th>Height</th><td>{{$product->height}} (mm)</td>
                                    </tr>
                                    <tr>
                                        <th>Weight</th><td>{{$product->weight}} (kg)</td>
                                    </tr>
                                    <tr>
                                        <th>OS</th><td>{{$product->os}}</td>
                                    </tr>
                                    <tr>
                                        <th>Release Year</th><td>{{$product->releaseyear}}</td>
                                    </tr>
                            </table>
                        </div>
                        <div class="tab-content-item " id="review">
                            
                            <div class="wrap-review-form">
                                
                                <div id="comments">
                                    <h2 class="woocommerce-Reviews-title">01 review for <span>{{$product->name}}</span></h2>
                                    <ol class="commentlist">
                                        <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                            <div id="comment-20" class="comment_container"> 
                                                <div class="comment-text">
                                                    <div class="star-rating">
                                                        <span class="width-100-percent">Rated <strong class="rating">4</strong> out of 5</span>
                                                    </div>
                                                    <p class="meta"> 
                                                        <strong class="woocommerce-review__author">admin</strong> 
                                                        <span class="woocommerce-review__dash">–</span>
                                                        <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >Tue, Aug 15,  2017</time>
                                                    </p>
                                                    <div class="description">
                                                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </div><!-- #comments -->
                                <div id="review_form_wrapper">
                                    <div id="review_form">
                                        <div id="respond" class="comment-respond"> 

                                            <form action="#" method="post" id="commentform" class="comment-form" novalidate="">
                                                <p class="comment-notes">
                                                    <span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
                                                </p>
                                                <div class="comment-form-rating">
                                                    <span>Your rating</span>
                                                    <p class="stars">
                                                        
                                                        <label for="rated-1"></label>
                                                        <input type="radio" id="rated-1" name="rating" value="1">
                                                        <label for="rated-2"></label>
                                                        <input type="radio" id="rated-2" name="rating" value="2">
                                                        <label for="rated-3"></label>
                                                        <input type="radio" id="rated-3" name="rating" value="3">
                                                        <label for="rated-4"></label>
                                                        <input type="radio" id="rated-4" name="rating" value="4">
                                                        <label for="rated-5"></label>
                                                        <input type="radio" id="rated-5" name="rating" value="5" checked="checked">
                                                    </p>
                                                </div>
                                                <p class="comment-form-author">
                                                    <label for="author">Name <span class="required">*</span></label> 
                                                    <input id="author" name="author" type="text" value="">
                                                </p>
                                                <p class="comment-form-email">
                                                    <label for="email">Email <span class="required">*</span></label> 
                                                    <input id="email" name="email" type="email" value="" >
                                                </p>
                                                <p class="comment-form-comment">
                                                    <label for="comment">Your review <span class="required">*</span>
                                                    </label>
                                                    <textarea id="comment" name="comment" cols="45" rows="8"></textarea>
                                                </p>
                                                <p class="form-submit">
                                                    <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                                                </p>
                                            </form>

                                        </div><!-- .comment-respond-->
                                    </div><!-- #review_form -->
                                </div><!-- #review_form_wrapper -->

                            </div>
                        </div>
                    </div>
                </div>
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
                                    <div class="wrap-price"><span class="product-price">${{$item->price}}</span></div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div><!--end sitebar-->

        <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">Related Products</h3>
                <div class="wrap-products">
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
                        @foreach ($relatedProduct as $item)
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{route('product-detail',$item->id)}}" title="{{$item->name}}">
                                    <figure><img src="{{asset('images/products/'.$item->image)}}" width="214" height="214" alt="{{$item->name}}"></figure>
                                </a>
                                <div class="wrap-btn">
                                    <input value="Quick View" class="function-link quickview" type="button" data-target="#quickview" data-toggle="modal" data-id_product ="{{$item->id}}">
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="{{route('product-detail',$item->id)}}" class="product-name"><span>{{$item->name}}</span></a>
                                <div class="wrap-price"><span class="product-price">${{$item->price}}</span></div>
                            </div>
                        </div>
                        @endforeach
                        

                    </div>
                </div><!--End wrap-products-->
            </div>
        </div>

    </div><!--end row-->

</div><!--end container-->
@endsection

@section('my-scripts')
<script>
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.add-to-cart').click(function(e) {
        e.preventDefault();     
        quantity = $('#product-quantity').val();
        pid = {{ $product->id }}

        $.ajax({
            type:'GET',
            url:'{{ route('add-cart') }}',
            data:{ pid:pid, quantity:quantity },
            success:function(data){
                window.location='{{ route('home') }}'  
            }
        });
    })
</script>
@endsection
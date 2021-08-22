@extends('shop.layout.layout1')
@section('contents')
@include('shop.layout.partials.alert')
<div class="container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
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
                        @foreach ($images as $image)
                            <li data-thumb="{{asset('images/gallery/'.$image->image)}}">
                                <img src="{{asset('images/gallery/'.$image->image)}}" alt="{{$product->name}}" />
                            </li>
                        @endforeach
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
                            <input id="product--id" type="hidden" value="{{$product->id}}">
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
                    <div class="wrap-price"><span class="product-price">${{number_format($product->price, 2, '.', ',')}}</span></div>
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
                        <a href="#" class="btn add-to-cart add-cart">Add to Cart</a>
                        @if (Session::has('user'))
                            <a class="btn add-to-cart add-wishlist">Add Wishlist</a>
                        @else
                            <a href="{{route('view-wishlist')}}" class="btn add-to-cart">Add Wishlist</a>
                        @endif
                    </div>
                </div>
                <div class="advance-info">
                    <div class="tab-control normal">
                        <a href="#description" class="tab-control-item active">description</a>
                        <a href="#add_infomation" class="tab-control-item">Tech Specs</a>
                        <a href="#review" id="review-tab" class="tab-control-item">Reviews</a>
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
                                                @foreach ($reviews as $review)
                                                <div style="border-bottom: 1px solid rgb(218, 214, 214) " class="comment-text">
                                                    <div class="product-rating">
                                                        @for ($i = 1; $i <= $review->rate; $i++)
                                                            <i style="color: #efce4a" class="fa fa-star" aria-hidden="true"></i>
                                                        @endfor
                                                    </div>
                                                    <p class="meta"> 
                                                        <strong class="woocommerce-review__author">{{$review->name}}</strong> 
                                                        <span class="woocommerce-review__dash">–</span>
                                                        <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >{{$review->created_at}}</time>
                                                    </p>
                                                    <div class="description">
                                                        <p>{{$review->comment}}</p>
                                                    </div>
                                                </div>
                                                @endforeach
                                                
                                            </div>
                                        </li>
                                    </ol>
                                </div><!-- #comments -->
                                <div id="review_form_wrapper">
                                    <div id="review_form">
                                        <div id="respond" class="comment-respond"> 
                                            <form id="form-review" action="{{route('comment')}}" method="post" id="commentform" class="comment-form" novalidate="">
                                                @csrf
                                                <input type="hidden" value="{{$product->id}}" name="product_id">
                                                <p class="comment-notes">
                                                    <span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
                                                </p>
                                                <div class="comment-form-rating">
                                                    <span>Your rating</span>
                                                    <p class="stars">
                                                        <label for="rated-1"></label>
                                                        <input type="radio" id="rated-1" name="rate" value="1">
                                                        <label for="rated-2"></label>
                                                        <input type="radio" id="rated-2" name="rate" value="2">
                                                        <label for="rated-3"></label>
                                                        <input type="radio" id="rated-3" name="rate" value="3">
                                                        <label for="rated-4"></label>
                                                        <input type="radio" id="rated-4" name="rate" value="4">
                                                        <label for="rated-5"></label>
                                                        <input type="radio" id="rated-5" name="rate" value="5" checked="checked">
                                                    </p>
                                                </div>
                                                <ul>
                                                    <div id="authorErr" class="text-danger font-italic errMessager"></div>
                                                    <div id="emailErr" class="text-danger font-italic errMessager"></div>
                                                    <div id="commentErr" class="text-danger font-italic errMessager"></div>
                                                </ul>
                                                <p class="comment-form-author">
                                                    <label for="author">Name <span class="required">*</span></label> 
                                                    <input id="author" name="name" type="text" required>
                                                    
                                                </p>
                                                 
                                                <p class="comment-form-email">
                                                    <label for="email">Email <span class="required">*</span></label> 
                                                    <input id="email" name="email" type="email" required>
                                                </p>
                                                <p class="comment-form-comment">
                                                    <label for="comment">Your review <span class="required">*</span>
                                                    </label>
                                                    <textarea id="comment" name="comment" cols="45" rows="8" required></textarea>
                                                </p>
                                                <p class="form-submit">
                                                    <input name="submit" type="submit" id="submit" onclick="return validateCommentForm()" class="submit" value="Submit">
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
            {{-- <div class="widget widget-our-services ">
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
            </div> --}}
            <!-- Categories widget-->

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
                                <div class="wrap-price"><span class="product-price">${{number_format($item->price, 2, '.', ',')}}</span></div>
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
   
    $('.add-cart').click(function(e) {
        e.preventDefault();     
        quantity = $('#product-quantity').val();
        pid = {{ $product->id }}
        $.ajax({
            type:'GET',
            url:'{{ route('add-cart') }}',
            data:{ pid:pid, quantity:quantity },
            success:function(data){
                // window.location='{{ route('home') }}'  
                swal("Successfully Added", "The item has been added to your cart", "success",{
                    button: "Close"
                });
            }
        });
    });
    $('.add-wishlist').click(function(e) {
        e.preventDefault();
        pid = {{ $product->id }}
        $.ajax({
            type:'get',
            url:'{{route('add-wishlist')}}',
            data:{pid:pid},
            success:function(data){
                if(!data){
                    swal("Successfully Saved", "The item has been added to your wishlist", "success",{
                    button: "Close"
                    });
                }
                // else{
                //     alert(data)
                // window.location='{{ route('login') }}'  
                // }
            }
            
        });
    });

    function printErr(elementID,hintMess)
    {
        document.getElementById(elementID).innerHTML=hintMess;
    }
    function validateCommentForm()
    {
        var author = document.getElementById('author').value;
        var email = document.getElementById('email').value;
        var comment = document.getElementById('comment').value;
        var Author = document.getElementById('author');
        var Email = document.getElementById('email');
        var Comment = document.getElementById('comment');
        var AuthorErr = EmailErr = CommentErr = true;
    // Validate author
        if (author==""){
            printErr("authorErr","-- Name is required.");
            Author.classList.add("input-err");
        }else{
            printErr("authorErr","");
            Author.classList.remove("input-err");
            AuthorErr = false;
        }
    // Validate email
    if (email==""){
        printErr("emailErr"," -- Email Address is required.");
        Email.classList.add("input-err");
    }else{
        var regex = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;  
        if (regex.test(email)==false)
        {
            printErr("emailErr","-- Email Address is invalid");
            Email.classList.add("input-err");
        }else{
            printErr("emailErr","");
            Email.classList.remove("input-err");
            EmailErr = false;
        }
    }
    // Validate comment
    if (comment==""){
        printErr("commentErr","-- Comment must not be blank.");
        Comment.classList.add("input-err");
    }else{
        if(comment.length<10){
            printErr("commentErr","-- Comment must be greater than 10 characters");
            Comment.classList.add("input-err");
        }else{
            printErr("commentErr","");
            Comment.classList.remove("input-err");
            CommentErr = false;
        }
        
    }
        if (AuthorErr==true||EmailErr==true||CommentErr==true)
        {
            return false;
        }
        else
        {
            return;
        }
    }
</script>
@endsection
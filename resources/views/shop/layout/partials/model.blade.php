<div class="modal" id="quickview" style="top:10px">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 main-content-area">
                        <div class="wrap-product-detail">
                            <div class="detail-media">
                                <div class="product-gallery">
                                  <ul class="slides">
                                        <li data-thumb="{{asset('assets/images/products/digital_18.jpg')}}">
                                        <img src="{{asset('assets/images/products/digital_18.jpg')}}" alt="product thumbnail" />
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
                                <div class="product-rating">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <a href="#" class="count-review">(05 review)</a>
                                </div>
                                
                                <h2 class="product-name" id="quickview_name"></h2>
                                <div class="short-desc">
                                    <ul>
                                        <li id="quickview_cpu"></li>
                                        <li id="quickview_ram"></li>
                                        <li id="quickview_hd"></li>
                                        <li id="quickview_screensize"></li>
                                        <li id="quickview_gcard"></li>
                                        <li id="quickview_dimension"></li>
                                        <li id="quickview_weight"></li>
                                        <li id="quickview_os"></li>
                                        <li id="quickview_releaseyear"></li>
                                    </ul>
                                </div>
                                <div class="wrap-price"><span class="product-price" id="quickview_price"></span></div>
                                <div class="stock-info in-stock">
                                    <p class="availability">Availability: <b id="quickview_avail"></b></p>
                                </div>
                                <div class="quantity">
                                    <span>Quantity:</span>
                                    <div class="quantity-input">
                                        <input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" >
                                        
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
                        </div>
                    </div><!--end main products area-->
                </div><!--end row-->
            </div><!--end container-->
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
  </div>
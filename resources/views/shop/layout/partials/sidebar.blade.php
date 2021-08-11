<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
    
    <div class="widget mercado-widget filter-widget brand-widget">
        {{-- BRAND --}}
        <div class="widget-content">
            <ul class="list-style vertical-list list-limited" data-show="6">
                <h5 style="border-bottom:1px solid grey;padding-bottom:10px;font-weight:bold">BRAND</h5>
                @foreach ($brands as $brand)
                    <div class="checkbox use-chosen">
                    <label ><input type="checkbox" name="checked_brands[]" {{in_array($brand->id,$checked_brands)?'checked':''}} value="{{$brand->id}}">{{$brand->brand}}</label>
                  </div>
                @endforeach
            </ul>
        </div>
        {{-- RAM --}}
        <div class="widget-content">
            <ul class="list-style vertical-list list-limited" data-show="6">
                <h5 style="border-bottom:1px solid grey;padding-bottom: 10px;padding-top: 10px;font-weight:bold">SYSTEM RAM</h5>
                @foreach ($rams as $ram)
                    <div class="checkbox use-chosen">
                    <label ><input type="checkbox" name="checked_rams[]" {{in_array($ram->amountofram,$checked_rams)?'checked':''}} value="{{$ram->amountofram}}">{{$ram->amountofram}} GB</label>
                  </div>
                @endforeach
            </ul>
        </div>
        {{-- HARD DRIVER --}}
        <div class="widget-content">
            <ul class="list-style vertical-list list-limited" data-show="6">
                <h5 style="border-bottom:1px solid grey;padding-bottom: 10px;padding-top: 10px;font-weight:bold">HARD DRIVE</h5>
                @foreach ($hds as $hd)
                    <div class="checkbox use-chosen">
                    <label ><input type="checkbox" name="checked_hds[]" {{in_array($hd->hdcapacity,$checked_hds)?'checked':''}} value="{{$hd->hdcapacity}}">{{$hd->hdcapacity}} GB {{$hd->hdtype}}</label>
                  </div>
                @endforeach
            </ul>
        </div>
        {{-- SCREEN SIZE --}}
        <div class="widget-content">
            <ul class="list-style vertical-list list-limited" data-show="6">
                <h5 style="border-bottom:1px solid grey;padding-bottom: 10px;padding-top: 10px;font-weight:bold">SCREEN SIZE</h5>
                @foreach ($screensizes as $screensize)
                    <div class="checkbox use-chosen">
                    <label ><input type="checkbox" name="checked_screensizes[]" {{in_array($screensize->screensize,$checked_screensizes)?'checked':''}} value="{{$screensize->screensize}}">{{$screensize->screensize}} inches</label>
                  </div>
                @endforeach
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

</div><!--end sitebar-->
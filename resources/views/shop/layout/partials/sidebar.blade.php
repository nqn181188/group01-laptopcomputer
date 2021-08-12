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
        {{-- CPU --}}
        <div class="widget-content">
            <ul class="list-style vertical-list list-limited" data-show="6">
                <h5 style="border-bottom:1px solid grey;padding-bottom: 10px;padding-top: 10px;font-weight:bold">CPU</h5>
                @foreach ($cputypes as $cputype)
                    <div class="checkbox use-chosen">
                        <label ><input type="checkbox" name="checked_cputypes[]" {{in_array($cputype->cputype,$checked_cputypes)?'checked':''}} value="{{$cputype->cputype}}">{{$cputype->cputype}}</label>
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
        {{-- GRAPHIC CARD --}}
        <div class="widget-content">
            <ul class="list-style vertical-list list-limited" data-show="6">
                <h5 style="border-bottom:1px solid grey;padding-bottom: 10px;padding-top: 10px;font-weight:bold">GRAPHIC CARD</h5>
                <div class="checkbox use-chosen">
                    <label ><input type="checkbox" name="checked_gcards[]" {{in_array('onboard',$checked_gcards)?'checked':''}} value="onboard">Onboard</label>
                    <div></div>
                    <label ><input type="checkbox" name="checked_gcards[]" {{in_array('nvidia',$checked_gcards)?'checked':''}} value="nvidia">NVIDIA GeForce</label>
                </div>
            </ul>
        </div>
        <div class="widget-content">
            <ul class="list-style vertical-list list-limited" data-show="6">
                <h5 style="border-bottom:1px solid grey;padding-bottom: 10px;padding-top: 10px;font-weight:bold">PRICE</h5>
                    <div class="checkbox use-chosen">
                        <div class="form-group">
                            <select class="form-control" name="checked_price" id="sel1">
                              <option value="">Choose a range of price</option>
                              <option value="0" {{$checked_price=='0'?'selected':''}}>$0 - $500</option>
                              <option value="500" {{$checked_price=='500'?'selected':''}}>$500 - $1000</option>
                              <option value="1000"{{$checked_price=='1000'?'selected':''}}>$1000 - $1500</option>
                              <option value="1500" {{$checked_price=='1500'?'selected':''}}>$1500 - $2000</option>
                              <option value="2000" {{$checked_price=='2000'?'selected':''}}>$2000+</option>
                            </select>
                          </div>
                    {{-- <label ><input type="checkbox" name="checked_price" {{$checked_price=='0'?'checked':''}} value="0">$0 - $500</label>
                    <div></div>
                    <label ><input type="checkbox" name="checked_price" {{$checked_price=='500'?'checked':''}} value="500">$500 - $1000</label>
                    <div></div>
                    <label ><input type="checkbox" name="checked_price" {{$checked_price=='1000'?'checked':''}} value="1000">$1000 - $1500</label>
                    <div></div>
                    <label ><input type="checkbox" name="checked_price" {{$checked_price=='1500'?'checked':''}} value="1500">$1500 - $2000</label>
                    <div></div>
                    <label ><input type="checkbox" name="checked_price" {{$checked_price=='2000'?'checked':''}} value="2000">$2000+</label> --}}
                    </div>
            </ul>
        </div>
    </div><!-- brand widget-->
{{-- 
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
    </div><!-- brand widget--> --}}

</div><!--end sitebar-->
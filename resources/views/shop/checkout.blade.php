@extends('shop.layout.layout1')
@section('contents')
<<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{ route('home') }}" class="link">home</a></li>
            <li class="item-link"><a href="{{ route('checkout') }}" class="link">checkout</a></li>
        </ul>
    </div>
    <div class=" main-content-area">
        <form action="{{route('chosen-payment') }}" method="post" name="frm-billing" >
            @php
            $total = 0;
            foreach(Session::get('cart') as $item){
                $total += $item->quantity * $item->price;
            }
            @endphp
            @csrf
            <div class="wrap-address-billing">
                <h3 class="box-title">Billing Address</h3>
                <h4 class="form-subtitle"><span style="color: red" style="color:  red">*</span> Require fillable</h4>
                <p class="row-in-form">
                    <label for="fname">first name<span style="color:  red" >*</span></label>
                    <input id="fname" type="text" name="fname" value="{{Session::has('billInfor')}}" placeholder="Your name" title="No special characters or number" required onkeydown="this.value = this.value.trim()" onkeyup="this.value = this.value.trim()"/>
                </p>
                <p class="row-in-form">
                    <label for="lname">last name<span style="color:  red">*</span></label>
                    <input id="lname" type="text" name="lname" value="" placeholder="Your last name"  pattern="[a-zA-Z]+"  title="No special characters or number" required />
                </p>
                <p class="row-in-form">
                    <label for="email">Email Addreess:</label>
                    <input id="email" type="email" name="email" value="" placeholder="Type your email"  required email/>
                </p>
                <p class="row-in-form">
                    <label for="phone">Phone number<span style="color:  red">*</span></label>
                    <input id="phone" type="text" name="phone" value="" placeholder="10 digits format"  pattern="(\+84|0)\d{9,10}" required placeholder="+84/0 xxxxxxxxx"/>
                  
                </p>
                <p class="row-in-form fill-wife">
                    <label for="add">Address:</label>
                    <input id="add" type="text" name="add" value="" placeholder="Street at apartment number" title="No special characters" required />
                </p>
            
            </div>

            <div class="wrap-address-billing">
                <h3 class="box-title">Shipping Address</h3>
            
                <p class="row-in-form">
                    <label for="fname">Ship first name<span style="color:  red">*</span></label>
                    <input id="fname" type="text" name="sfname" value="" placeholder="First Name"  title="No special characters or number"  required  />
                </p>
                <p class="row-in-form">
                    <label for="lname">Ship last name<span style="color:  red">*</span></label>
                    <input id="lname" type="text" name="slname" value="" placeholder="Last Name" title="No special characters or number" required />
                </p>
                <p class="row-in-form">
                    <label for="email">ship email addreess:</label>
                    <input id="email" type="email" name="semail" value="" placeholder="Email Address" required  email/>
                </p>
                <p class="row-in-form">
                    <label for="phone">Ship phone number<span style="color:  red">*</span></label>
                    <input id="phone" type="number" name="sphone" value="" placeholder="10 digits format" required   pattern="(\+84|0)\d{9,10}" />
                </p>
                <p class="row-in-form fill-wife">
                    <label for="add">Ship address:</label>
                    <input id="add" type="text" name="sadd" value="" placeholder="Street at apartment number"  title="No special characters" required/>
                </p>
                
            
            </div>
            <div class="summary summary-checkout">
                <div class="summary-item payment-method">
                    <h4 class="title-box">Payment Method</h4>
                    <div class="choose-payment-methods">
                        <div class="checkbox">
                            <input type="radio" name="checked_payment" value="paypal" checked /><img style="width: 50% ; margin-left:20px" src="{{asset('images/paypalbutton.png')}}" alt="Paypal Checkout">
                        </div>
                    </div>
                    <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price"> ${{number_format($total, 2, '.', ',')}}</span></p>
                    {{-- <a href="thankyou.html" class="btn btn-medium">Place order now</a> --}}
                    <button type="submit" class="btn btn-medium">Place order now</button>
                </div>
                
            </div>
        </form>
    </div><!--end main content area-->
</div><!--end container-->
@endsection
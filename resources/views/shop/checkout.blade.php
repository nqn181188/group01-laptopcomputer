@extends('shop.layout.layout1')
@section('contents')
<<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{ route('home') }}" class="link">home</a></li>
            <li class="item-link"><span>checkout</span></li>
        </ul>
    </div>
    <div class=" main-content-area">
        <form action="#" method="post" name="frm-billing">
            @csrf
            <div class="wrap-address-billing">
                <h3 class="box-title">Billing Address</h3>
            
                <p class="row-in-form">
                    <label for="fname">first name<span>*</span></label>
                    <input id="fname" type="text" name="fname" value="" placeholder="Your name">
                </p>
                <p class="row-in-form">
                    <label for="lname">last name<span>*</span></label>
                    <input id="lname" type="text" name="lname" value="" placeholder="Your last name">
                </p>
                <p class="row-in-form">
                    <label for="email">Email Addreess:</label>
                    <input id="email" type="email" name="email" value="" placeholder="Type your email">
                </p>
                <p class="row-in-form">
                    <label for="phone">Phone number<span>*</span></label>
                    <input id="phone" type="number" name="phone" value="" placeholder="10 digits format">
                </p>
                <p class="row-in-form fill-wife">
                    <label for="add">Address:</label>
                    <input id="add" type="text" name="add" value="" placeholder="Street at apartment number">
                </p>
                <p class="row-in-form fill-wife">
                    <label class="checkbox-field">
                        <input name="createAccount" id="create-account" value="1" type="checkbox">
                        <span>Create an account?</span>
                    </label>
                    {{-- <label class="checkbox-field">
                        <input name="different-add" id="different-add" value="forever" type="checkbox">
                        <span>Ship to a different address?</span>
                    </label> --}}
                </p>
            
            </div>
            <div class="summary summary-checkout">
                <div class="summary-item payment-method">
                    <h4 class="title-box">Payment Method</h4>
                    <p class="summary-info"><span class="title">Check / Money order</span></p>
                    <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                    <div class="choose-payment-methods">
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-bank" value="bank" type="radio">
                            <span>Direct Bank Transder</span>
                            <span class="payment-desc">But the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</span>
                        </label>
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-visa" value="visa" type="radio">
                            <span>visa</span>
                            <span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
                        </label>
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-paypal" value="paypal" type="radio">
                            <span>Paypal</span>
                            <span class="payment-desc">You can pay with your credit</span>
                            <span class="payment-desc">card if you don't have a paypal account</span>
                        </label>
                    </div>
                    <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">$100.00</span></p>
                    {{-- <a href="thankyou.html" class="btn btn-medium">Place order now</a> --}}
                    <button type="submit" class="btn btn-medium">Place order now</button>
                </div>
                <div class="summary-item shipping-method">
                    <h4 class="title-box f-title">Shipping method</h4>
                    <p class="summary-info"><span class="title">Flat Rate</span></p>
                    <p class="summary-info"><span class="title">Fixed $50.00</span></p>
                    <h4 class="title-box">Discount Codes</h4>
                    <p class="row-in-form">
                        <label for="coupon-code">Enter Your Coupon code:</label>
                        <input id="coupon-code" type="text" name="coupon-code" value="" placeholder="">	
                    </p>
                    <a href="#" class="btn btn-small">Apply</a>
                </div>
            </div>
        </form>
    </div><!--end main content area-->
</div><!--end container-->
@endsection
@extends('shop.layout.layout1')
@section('contents')
<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><span>Register</span></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">							
            <div class=" main-content-area">
                <div class="wrap-login-item ">
                    
                    <div class="register-form form-item ">
                        <form class="form-stl" action="{{route('customer.edit',$customer->id)}}" name="frm-login" method="POST" >
                            @csrf
                            <input type="hidden" id="id" name="id" value="{{$customer->id}}">
                            <fieldset class="wrap-title">
                                <h3 class="form-title">My account</h3>
                                <h4 class="form-subtitle">Personal infomation</h4>
                            </fieldset>									
                            <fieldset class="wrap-input">
                                <label for="firstname">Firstname</label>
                                <input type="text" id="firstname" value="{{$customer->firstname}}" name="firstname" placeholder="First name" readonly>
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="lastname">Lastname</label>
                                <input type="text" id="lastname" value="{{$customer->lastname}}" name="lastname" placeholder="Last name" readonly>
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" value="{{$customer->email}}" name="email" placeholder="Email address" readonly>
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="address">Address</label>
                                <input type="text" id="address" value="{{$customer->address}}" name="address" placeholder="address" readonly>
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" value="{{$customer->phone}}" name="phone" placeholder="Phone number" readonly>
                            </fieldset>
                            <a href="{{ route('customer.edit', Session::get('user')->id) }}" class="btn btn-sign">Change Profile</a>
                            <a href="{{ route('customer.edit-pass', Session::get('user')->id) }}" class="btn btn-sign">Change Password</a>
                        </form>
                    </div>											
                </div>
            </div><!--end main products area-->		
        </div>
    </div><!--end row-->

</div><!--end container-->

@endsection
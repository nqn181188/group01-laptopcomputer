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
                    
                    @if ($errors->any()) 
                    <!--hiển thị thông báo lỗi-->  
                    <div class="card">
                        <div class="card-body">
                            <ul class='error'>
                                @foreach($errors->all() as $err)
                                <div class="alert alert-danger">
                                <li>{{ $err }}</li>
                                </div> 
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                    <div class="register-form form-item ">
                        <form class="form-stl" action="{{route('customer.store')}}" name="frm-login" method="POST" >
                            @csrf
                            <fieldset class="wrap-title">
                                <h3 class="form-title">Create an account</h3>
                                <h4 class="form-subtitle">Personal infomation</h4>
                            </fieldset>									
                            <fieldset class="wrap-input">
                                <label for="firstname">Firstname</label>
                                <input type="text" id="firstname" name="firstname" placeholder="First name">
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="lastname">Lastname</label>
                                <input type="text" id="lastname" name="lastname" placeholder="Last name">
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" placeholder="Email address">
                            </fieldset>
                            {{-- <fieldset class="wrap-input">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" placeholder="Phone number">
                            </fieldset> --}}
                            <fieldset class="wrap-title">
                                <h3 class="form-title">Login Information</h3>
                            </fieldset>
                            <fieldset class="wrap-input item-width-in-half left-item ">
                                <label for="password">Password</label>
                                <input type="text" id="password" name="password" placeholder="Password">
                            </fieldset>
                            <fieldset class="wrap-input item-width-in-half ">
                                <label for="confirm">Confirm Password</label>
                                <input type="text" id="confirm" name="confirm" placeholder="Confirm Password">
                            </fieldset>
                            <input type="submit" class="btn btn-sign" value="Register" name="register">
                        </form>
                    </div>											
                </div>
            </div><!--end main products area-->		
        </div>
    </div><!--end row-->

</div><!--end container-->

@endsection
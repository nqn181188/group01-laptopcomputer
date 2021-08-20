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
                        <form class="form-stl" action="{{route('customer.update-pass',$customer->id)}}" name="frm-login" method="POST" >
                            @method('put')
                            @csrf
                            <input type="hidden" id="id" name="id" value="{{$customer->id}}">
                            
                            <fieldset class="wrap-title">
                                <h3 class="form-title">Login Information</h3>
                            </fieldset>
                            <fieldset class="wrap-input ">
                                <label for="current_password">Old Password</label>
                                <input type="password" id="password" name="current_password" placeholder="Current Password" class="@error('current_password') is-invalid @enderror" required>
                                @error('current_password')
                               <span class="text-danger">{{$message}}</span>
                                @enderror
                            </fieldset>
                            <fieldset class="wrap-input ">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" placeholder="Password">
                                @error('password')
                               <span class="text-danger">{{$message}}</span>
                                @enderror
                            </fieldset>
                            <fieldset class="wrap-input  ">
                                <label for="confirm">Confirm Password</label>
                                <input type="password" id="confirm" name="confirm" placeholder="Confirm Password">
                                @error('confirm')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </fieldset>
                            <div>
                                <input type="submit" class="btn btn-sign" value="Update" name="Update">
                            </div>
                        </form>
                    </div>											
                </div>
            </div><!--end main products area-->		
        </div>
    </div><!--end row-->

</div><!--end container-->

@endsection

php artisan make:controller Shop/Profile/PasswordController -m Customer
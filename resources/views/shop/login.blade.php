@extends('shop.layout.layout1')
@section('contents')
<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><span>login</span></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
            <div class=" main-content-area">
                <div class="wrap-login-item ">						
                    <div class="login-form form-item form-stl">
                        <form action="{{route('customer.process-login')}}" method="POST" name="frm-login">
                            @csrf
                            <fieldset class="wrap-title">

                                @if (Session::has('success_register'))
                                    <div class="alert alert-success" role="alert">
                                        <h2 class="form-title">Register Success</h2>										
                                    </div>
                                @endif
                                
                                @if (Session::has('customer_lock'))
                                <script>
                                    <div class="alert alert-danger" role="alert">
                                        <h2 class="form-title">Your account has been locked.</h2>										
                                    </div>
                                </script>
                                @endif
                                <h3 class="form-title">Log in to your account</h3>										
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="email">Email Address:</label>
                                <input type="text" id="email" name="email" placeholder="Type your email address">
                                <div  ><span id="messageEmail" class="text-danger"></span></div>
                                @error('email')
                                    <div><span class="text-danger">{{$message}}</span></div>
                                @enderror
                                @if (Session::has('msg'))
                                <div><span class="text-danger">{{Session::get('msg')}}</span></div>
                                @endif
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" placeholder="************">
                            </fieldset>
                            @error('password')
                                <div><span class="text-danger">{{$message}}</span></div>
                            @enderror
                            
                                @if (Session::has('msgPass'))
                                    <div><span class="text-danger">{{Session::get('msgPass')}}</span></div>
                                @endif
                            
                            <fieldset class="wrap-input">
                                <label class="remember-field">
                                    <input class="frm-input " name="rememberme" id="rememberme" value="forever" type="checkbox"><span>Remember me</span>
                                </label>
                                <a class="link-function left-position" href="#" title="Forgotten password?">Forgotten password?</a>
                            </fieldset>
                            <input type="submit" class="btn btn-submit" value="Login" name="submit">
                        </form>
                    </div>												
                </div>
            </div><!--end main products area-->		
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

        $(document).ready(function(){

        $("#email").keyup(function(){
            emailInput = $(this).val();
            
            $.ajax({
            type:'get',
            url:'{{ route('check-email') }}',
            data:{ email:emailInput },
            success:function(data){
                // alert(data);
                if(data==1){
                    $("#messageEmail").html('');
                }else if(!emailInput){
                    $("#messageEmail").html('');
                }else{
                    $("#messageEmail").html('Email is not exist');
                }
            }
            });
             

        });

        });
    </script>


@if (Session::has('success_register'))
<script>
    swal("Congratulation Login Now","{!! Session::get('success_register') !!}", "success",{
        button: "OK"
    });
</script>
@endif

@if (Session::has('customer_lock'))
<script>
    swal("Oops sorry!!","{!! Session::get('customer_lock') !!}", "success",{
        button: "OK"
    });
</script>
@endif

@endsection
{{-- 
@section('my-scripts')
@if (Session::has('success_register'))
<script>
    swal("Now you can join with us","{!! Session::get('success_register') !!}", "success",{
        button: "OK"
    });
</script>
@endif
@endsection --}}
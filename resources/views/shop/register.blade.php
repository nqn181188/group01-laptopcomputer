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
                        <form class="form-stl" action="{{route('customer.store')}}" name="frm-login" method="POST" >
                            @csrf
                            <fieldset class="wrap-title">
                                <h3 class="form-title">Create an account</h3>
                                <h4 class="form-subtitle">Personal infomation</h4>
                            </fieldset>									
                            <fieldset class="wrap-input">
                                <label for="firstname">Firstname</label>
                                <input type="text" id="firstname" name="firstname" placeholder="First name">
                                @error('firstname')
                                <div><span class="text-danger">{{$message}}</span></div>
                                @enderror
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="lastname">Lastname</label>
                                <input type="text" id="lastname" name="lastname" placeholder="Last name">
                                @error('lastname')
                                <div><span class="text-danger">{{$message}}</span></div>
                                @enderror
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" placeholder="Email address">
                                <div  ><span id="messageEmail" class="text-danger"></span></div>
                                @error('email')
                                <div><span class="text-danger">{{$message}}</span></div>
                                @enderror
                            </fieldset>
                            {{-- <fieldset class="wrap-input">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" placeholder="Phone number">
                                 @error('email')
                                <div><span class="text-danger">{{$message}}</span></div>
                                @enderror
                            </fieldset> --}}
                            <fieldset class="wrap-title">
                                <h3 class="form-title">Login Information</h3>
                            </fieldset>
                            <fieldset class="wrap-input item-width-in-half left-item ">
                                <label for="password">Password</label>
                                <input type="text" id="password" name="password" placeholder="Password">
                                @error('password')
                                <div><span class="text-danger">{{$message}}</span></div>
                                @enderror
                            </fieldset>
                            <fieldset class="wrap-input item-width-in-half ">
                                <label for="confirm">Confirm Password</label>
                                <input type="text" id="confirm" name="confirm" placeholder="Confirm Password">
                                @error('confirm')
                                <div><span class="text-danger">{{$message}}</span></div>
                                @enderror
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
                    $("#messageEmail").html('Email exist');
                }else{
                    $("#messageEmail").html('');
                }
            }
            });
             

        });

        });
    </script>
@endsection
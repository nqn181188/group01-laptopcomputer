@extends('shop.layout.layout1')
@section('contents')
<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
            <li class="item-link"><span>My Account</span></li>
            <li class="item-link"><span>Change Profile</span></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">							
            <div class=" main-content-area">
                <div class="wrap-login-item ">
                    
                    <div class="register-form form-item ">
                        <form class="form-stl" action="{{route('profile.update',$customer->id)}}" name="frm-login" method="POST" >
                            @method('put')
                            @csrf
                            <input type="hidden" id="id" name="id" value="{{$customer->id}}">
                            <input type="hidden" id="lock" name="lock" value="{{$customer->lock}}">
                            <fieldset class="wrap-title">
                                <h3 class="form-title">My account</h3>
                                <h4 class="form-subtitle">Personal infomation</h4>
                                <h4 class="form-subtitle"><span style="color: red">*</span> Require fillable</h4>
                            </fieldset>									
                            <fieldset class="wrap-input">
                                <label for="firstname">Firstname</label>
                                <input style="cursor: not-allowed" type="text" id="firstname" value="{{ old('firstname',$customer->firstname)}}" name="firstname" placeholder="First name" readonly>
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="lastname">Lastname</label>
                                <input style="cursor: not-allowed" type="text" id="lastname" value="{{ old('lastname',$customer->lastname)}}" name="lastname" placeholder="Last name" readonly>
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="email">Email Address<span style="color: red">*</span></label>
                                <input type="email" id="email" value="{{ old('email',$customer->email)}}" name="email" placeholder="Email address">
                                @error('email')
                                <div><span class="text-danger">{{$message}}</span></div>
                                @enderror
                            </fieldset>
                                
                            <fieldset class="wrap-input">
                                <label for="address">Address<span style="color: red">*</span></label>
                                <input type="text" id="address" value="{{ old('address',$customer->address)}}" name="address" placeholder="Address">
                                @error('address')
                                <div><span class="text-danger">{{$message}}</span></div>
                                @enderror
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="phone">Phone<span style="color: red">*</span></label>
                                <input type="text" id="phone" value="{{ old('phone',$customer->phone)}}" name="phone" placeholder="Phone number">
                                @error('phone')
                                <div><span class="text-danger">{{$message}}</span></div>
                                @enderror
                            </fieldset>
                            
                            <input type="submit" class="btn btn-sign" value="Update" name="Update">
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
    $('#frm-login').validate({
    ignore : [],
    rules : { 
     // rules here  for validation
    },
    messages : {
     // messages here for validation
    },
    errorPlacement : function (error, element) {
    if (element.hasClass('select2')) {
        error.insertAfter(element.next('span'));
    } 
    else {
        error.insertAfter(element);
    }
    },
    submitHandler : function (form){
        $.ajax({
            type: 'POST',
            url: 'url',
            async: true,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {

            },
            complete: function () {
                return;
            },
            success: function() {
                swal("Good job!", "You clicked the button!", "success");
            }
        });
    }
});
</script>
@endsection
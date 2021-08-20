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
                      <table>
                        
                        <tbody>

                        </tbody>
                      </table> 


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
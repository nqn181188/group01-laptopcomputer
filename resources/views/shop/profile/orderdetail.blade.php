@extends('shop.layout.layout1')
@section('contents')
<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
            <li class="item-link"><a href="{{route('profile.index')}}" class="link">Order History</a></li>
            <li class="item-link"><span>Order Detail</span></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-6 col-md-offset-0">							
            <div class=" main-content-area">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Order Number : #{{$billInfor->ordernumber}} . Order Date : {{$billInfor->order_date}}</h3>
                </div>
                <div class="card-body p-0">
                  <div class="container-fluid">
                    <div class="row mb-3">
                      <div class="col-md-6 border-right" >
                        <h4 class="bg-info">Billing Information</h4>
                        <table>
                          <ul>
                            <tbody>
                              <tr><th>First Name : </th><td class="pl-3">{{$billInfor->firstname}}</td></tr>
                              <tr><th>Last Name : </th><td class="pl-3">{{$billInfor->lastname}}</td></tr>
                              <tr><th>Email Address : </th><td class="pl-3">{{$billInfor->email}}</td></tr>
                              <tr><th>Phone Number : </th><td class="pl-3">{{$billInfor->phone}}</td></tr>
                              <tr><th>Address : </th><td class="pl-3">{{$billInfor->address}}</td></tr>
          
                            </tbody>
                          </ul>
                        </table>
                      </div>
                      <div class="col-md-6">  
                        <h4 class="bg-info">Shipping Information</h4>
                        <table>
                          <ul>
                            <tbody>
                              <tr><th>First Name : </th><td class="pl-3">{{$shipInfor->shipfirstname}}</td></tr>
                              <tr><th>Last Name : </th><td class="pl-3">{{$shipInfor->shiplastname}}</td></tr>
                              <tr><th>Email Address : </th><td class="pl-3">{{$shipInfor->shipemail}}</td></tr>
                              <tr><th>Phone Number : </th><td class="pl-3">{{$shipInfor->shipphone}}</td></tr>
                              <tr><th>Address : </th><td class="pl-3">{{$shipInfor->shipaddress}}</td></tr>
                            </tbody>
                          </ul>
                        </table>
                      </div>
                  </div>  
                  </div>
                 
                  <div class="row">
                    <table class="table table-striped project ">
                      <thead class="bg-dark">
                        <tr>
                          <th class="text-center align-middle" style="width: 10%">Roll Number</th>
                          <th class="text-center align-middle" style="width: 20%">Product Image</th>
                          <th class="text-center align-middle" style="width: 40%">Product Name</th>
                          <th class="text-center align-middle" style="width: 10%">Price</th>
                          <th class="text-center align-middle" style="width: 10%">Quantity</th>
                          <th class="text-center align-middle" style="width: 10%">Total Price</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $count=1;
                        @endphp
                        @foreach ($orderProducts as $orderProduct)
                          <tr>
                            <td class="text-center align-middle">
                              <span>{{$count++}}</span>
                            </td>
                            <td class="text-center">
                                @if($orderProduct['image']!=null)
                                <img class="d-block mx-auto" src="{{asset('/images/products/'.$orderProduct['image'])}}" alt="{{$orderProduct['name']}}" style="width: 30%">
                                @endif
                            </td>
                            <td class="align-middle text-center">{{$orderProduct['name']}}</td>
                            <td class="text-center align-middle">${{number_format($orderProduct['price'], 2, '.',',')}}</td>
                            <td class="text-center align-middle">{{$orderProduct['quantity']}}</td>
                            <td class="text-right align-middle">${{number_format($orderProduct['price']*$orderProduct['quantity'], 2, '.',',')}}</td>
                          </tr>
                        @endforeach
                        <tr class="bg-light">
                          <td colspan="5" class="text-center align-middle font-weight-bold" style="font-weight: bold">TOTAL</td>
                          <td style="font-weight: bold" class="text-right text-success" >${{number_format($totalPrice, 2, '.', ',')}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  
                </div> 
                <!-- /.card-body --> 
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
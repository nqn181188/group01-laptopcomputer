@extends('shop.layout.layout1')
@section('contents')
<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
            <li class="item-link"><span>order history</span></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-6 col-md-offset-0">							
            <div class=" main-content-area">
                <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Order List</h3>
                            </div>
                            <div class="card-body p-0">
                                @if ($orders)
                                <table class="table table-striped projects">
                                    <thead class="bg-dark">
                                        <tr>
                                        <th class="text-center align-middle" style="width: 5%">Roll Number</th>
                                        <th class="text-center align-middle" style="width: 15%">Order Number</th>
                                        <th class="text-center align-middle" style="width: 30%">Order Date</th>
                                        <th class="text-center align-middle" style="width: 10%">Status</th>
                                        <th class="text-center align-middle" style="width: 30%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $count=1;
                                    @endphp
                                    @foreach($orders as $order)
                                    <tr>
                                        <td class="text-center align-middle">{{$count++}}</td>
                                        <td class="text-center align-middle">{{$order->ordernumber}}</td>
                                        <td class="text-center align-middle">{{$order->order_date}}</td>
                                        <td class="text-center align-middle">
                                        @if($order->status==1)
                                            <span class="badge badge-success"> In Process</span>
                                            @elseif($order->status==2)
                                            <span class="badge badge-success">Shipping</span>
                                            @elseif($order->status==3)
                                            <span class="badge badge-success">Shipped</span>
                                        @endif
                                        </td>
                                        <td class="text-center align-middle">
                                        <a href="{{route('profile.show',$order->ordernumber)}}" class="btn btn-primary">Detail</a>
                                        {{-- @if ($order->status==1)
                                        <form style="display:inline-block" action="{{ route('profile.destroy', $order->id) }}" method="POST">
                                            @method("DELETE")
                                            @csrf
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                        @endif --}}
                                        
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @else
                                No record
                                @endif
                                
                            </div>
                            <nav class="mt-3" aria-label="...">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item {{$orders->currentPage()==1?'disabled':''}}">
                                        <a href="{{request()->fullUrlWithQuery(['page' => 1]) }} " class="page-link">First</a>
                                    </li>
                                    <li class="page-item {{$orders->currentPage()==1?'disabled':''}}">
                                        <a href="{{request()->fullUrlWithQuery(['page' => $orders->currentPage()-1])}}" class="page-link">Previous</a>
                                    </li>
                                    @for ($i = 1; $i<=$orders->lastPage(); $i++)
                                      <li class="page-item {{$orders->currentPage()==$i?'active':''}}" ><a class="page-link" href="{{request()->fullUrlWithQuery(['page' => $i])}}">{{$i}}</a></li>
                                    @endfor
                                    <li class="page-item {{$orders->currentPage()==$orders->lastPage()?'disabled':''}}">
                                      <a href="{{request()->fullUrlWithQuery(['page' => $orders->currentPage()+1])}}" class="page-link">Next</a>
                                    </li>
                                    <li class="page-item {{$orders->currentPage()==$orders->lastPage()?'disabled':''}}">
                                      <a href="{{request()->fullUrlWithQuery(['page' => ceil($orders->total()/8)])}}" class="page-link">Last</a>
                                    </li>
                                </ul>
                                <p class="text-center text-secondary">Showing {{($orders->currentPage()-1)*8+1}}-{{($orders->currentPage()-1)*8+$orders->count()}} of {{$orders->total()}}</p>
                              </nav>
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


@if (Session::has('success-checkout'))
<script>
    swal("Thank you for using our services !!","{!! Session::get('success-checkout') !!}", "success",{
        button: "OK"
    });
</script>
@endif
@endsection
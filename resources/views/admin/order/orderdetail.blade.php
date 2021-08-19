@extends('admin.layout.layout')

@section('contents')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Order Detail</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Order Detail</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
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
                <th class="text-center align-middle" style="width: 50%">Product Name</th>
                <th class="text-center align-middle" style="width: 10%">Quantity</th>
                <th class="text-center align-middle" style="width: 10%">Price</th>
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
                  <td>
                      @if($orderProduct['image']!=null)
                      <img class="d-block mx-auto" src="{{asset('/images/products/'.$orderProduct['image'])}}" alt="{{$orderProduct['name']}}" style="width: 30%">
                      @endif
                  </td>
                  <td class="align-middle text-center">{{$orderProduct['name']}}</td>
                  <td class="text-center align-middle">{{$orderProduct['quantity']}}</td>
                  <td class="text-right align-middle">${{number_format($orderProduct['price'], 2, '.',',')}}</td>
                </tr>
              @endforeach
              <tr class="bg-light">
                <td colspan="4" class="text-center align-middle font-weight-bold">TOTAL</td>
                <td class="text-right text-success font-weight-bold" >${{number_format($totalPrice, 2, '.', ',')}}</td>
              </tr>
            </tbody>
          </table>
        </div>
        
      </div> 
      <!-- /.card-body --> 
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
@endsection
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
        <h3 class="card-title">Order Detail</h3>

        <div class="card-tools">
          <a href="{{ route('admin.order.create') }}"><i class="fas fa-user-plus"></i></a>
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                  <th>Order </th>
                  <th>Product </th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Ship First Name</th>
                  <th> Ship Last Name</th>
                  <th>Ship Email</th>
                  <th>Ship Phone</th>
                  <th>Ship Address</th>
                 
                </tr>
            </thead>
             <tbody>
              @foreach($orderdetail as $item)
              <tr>
                <td>{{$item->ordernumber}}</td>
                <td>{{$item->product_id}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->shipfirstname}}</td>
                <td>{{$item->shiplastname}}</td>
                <td>{{$item->shipemail}}</td>
                <td>{{$item->shipphone}}</td>
                <td>{{$item->shipaddress}}</td>
{{--                
                <td>
                 
                  <a href="{{ route('admin.order.edit', $item->id) }}" class="btn btn-primary">Detail</a>
                  <form style="display:inline-block" action="{{ route('admin.order.destroy', $item->id) }}" method="POST">
                    @method("DELETE")
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                  </form>
                
                </td> --}}
              </tr>
              @endforeach
            </tbody>
        </table>
      </div> 
      <!-- /.card-body --> 
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
@endsection
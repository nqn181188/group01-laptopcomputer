@extends('admin.layout.layout')

@section('contents')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Order List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Order List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header bg-dark">
        <form id="filter-orders" class="form-inline bg-dark">
          <input type="hidden" value={{$orders->currentPage()}} name="page">
          <div class="row mx-auto">
              <div class="d-inline use-chosen">
                <input name="search" type="text" class="form-control search-name" value="{{$search}}" id="name" placeholder="Search by order number...">
              </div>
              <div class="d-inline px-2">
                <select class="form-control use-chosen" name="status">
                    <option value=''>Select status</option>
                    <option {{$status==1?'selected':''}} value='1'>In Process</option>
                    <option {{$status==2?'selected':''}} value='2'>Shipping</option>
                    <option {{$status==3?'selected':''}} value='3'>Shipped</option>
                </select>
              </div>
          </div>
        </form>
    </div>
      <div class="card-body p-0">
        @if($orders->count()!=0)
        <table class="table table-striped projects">
            <thead class="bg-dark">
                <tr>
                  <th class="text-center align-middle" style="width: 5%">Roll Number</th>
                  <th class="text-center align-middle" style="width: 15%">Order Number</th>
                  <th class="text-center align-middle" style="width: 30%">Email</th>
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
                <td class="text-center align-middle">{{$order->email}}</td>
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
                  <a href="{{ route('admin.order.show',$order->ordernumber)}}" class="btn btn-primary">Detail</a>
                  <form style="display:inline-block" action="{{ route('admin.order.destroy', $order->id) }}" method="POST">
                    @method("DELETE")
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                  </form>
                
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
        @else
        <h4 class="text-danger text-center">There are no matching orders</h4>
        @endif
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
@endsection
@section('my-scripts')
<script type="text/javascript">
      $('.use-chosen').change(function(){
          $('#filter-orders').submit();
      });
</script>
@endsection
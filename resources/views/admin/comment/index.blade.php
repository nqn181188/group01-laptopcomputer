@extends('admin.layout.layout')

@section('contents')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Account</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Customer account</li>
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
        <h3 class="card-title">Customer Account</h3>

        <div class="card-tools">
          <a href="{{ route('admin.customercomment.create') }}"><i class="fas fa-user-plus"></i></a>
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
                  <th>Customer Id</th>
                  <th>Product Id</th>
                  <th>Comment</th>
                  <th>Rate</th>
                  <th>Actions</th>
                </tr>
            </thead>
            <tbody>
              @foreach($cusComments as $item)
              <tr>
                <td>{{ $item->cust_id }}</td>
                <td>{{ $item->product_id }}</td>
                <td>{{ $item->comment }}</td>
                <td>{{ $item->rate }}</td>
                <td>
                  <a href="{{ route('admin.customercomment.edit', $item->id) }}" class="btn btn-primary">Update</a>
                  <form style="display:inline-block" action="{{ route('admin.customercomment.destroy', $item->id) }}" method="POST">
                    @method("DELETE")
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                  </form>
                </td>
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
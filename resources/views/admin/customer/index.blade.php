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
          <a href="{{ route('admin.customer.create') }}"><i class="fas fa-user-plus"></i></a>
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
                  <th>First name</th>
                  <th>Last name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Lock</th>
                  <th>Actions</th>
                </tr>
            </thead>
            <tbody>
              @foreach($customers as $item)
              <tr>
                <td>{{ $item->firstname }}</td>
                <td>{{ $item->lastname }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->phone }}</td>
                <td>
                  @if ( $item->lock == 1)
                    Lock
                  @else
                      Normal
                  @endif
                </td>
                <td>
                  <a href="{{ route('admin.customer.edit', $item->id) }}" class="btn btn-primary">Update</a>
                  <form style="display:inline-block" action="{{ route('admin.customer.destroy', $item->id) }}" method="POST">
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
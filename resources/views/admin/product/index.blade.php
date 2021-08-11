@extends('admin.layout.layout')

@section('contents')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Product</li>
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
        <h3 class="card-title">Product</h3>

        <div class="card-tools">
          <a href="{{ route('admin.product.create') }}"><i class="fas fa-user-plus"></i></a>
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
                  <th>Name</th>
                  <th>Featured</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Brand</th>
                  <th>Model</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>CPU</th>
                  <th>Amount of RAM (GB)</th>
                  <th>Screen Size (inches)</th>
                  <th>Graphic Card</th>
                  <th>Hard Driver Capacity</th>
                  <th>Hard Drive Type</th>
                  <th>Width (mm)</th>
                  <th>Depth (mm)</th>
                  <th>Height (mm)</th>
                  <th>Weight (kg)</th>
                  <th>OS Information</th>
                  <th>Release Year</th>
                  <th>Action</th>
                </tr>
            </thead>
            {{-- <tbody>
              @foreach($products as $item)
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <a href="{{ route('admin.product.edit', $item->id) }}" class="btn btn-primary">Update</a>
                  <form style="display:inline-block" action="{{ route('admin.product.destroy', $item->id) }}" method="POST">
                    @method("DELETE")
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody> --}}
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
@endsection
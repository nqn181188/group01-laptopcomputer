@extends('admin.layout.layout')
@section('contents')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>BRAND</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">BRAND</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-body p-0">
        <table class="table table-striped project ">
          <thead class="bg-dark">
            <tr>
              <th class="text-center align-middle" style="width: 5%">Roll Number</th>
              <th class="text-center align-middle" style="width: 15%">Image</th>
              <th class="text-center align-middle" style="width: 35%">Brand</th>
              <th class="text-center align-middle" style="width: 5%">Number of products</th>
              <th class="text-center align-middle" style="width: 30%">Action</th>
            </tr>
          </thead>
          <tbody>
            @php
                $roll=1;
            @endphp
            @foreach ($brands as $brand)
              <tr>
                <td class="text-center align-middle">
                  <span>{{$roll++}}</span>
                </td>
                <td>
                    @if($brand->image!=null)
                    <img class="d-block mx-auto" src="{{asset('/images/brands/'.$brand->image)}}" alt="{{$brand->image}}" style="width: 100%">
                    @endif
                </td>
                <td class="text-center align-middle">{{$brand->brand}}</td>
                <td class="text-center align-middle">{{$count["$brand->id"]}}</td>
                <td class="text-center">
                  <a href="{{route('admin.brand.edit',$brand)}}" class="btn btn-primary">Edit</a>
                  <form style="display:inline-block" action="{{route('admin.brand.destroy',$brand)}}" method="POST">
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

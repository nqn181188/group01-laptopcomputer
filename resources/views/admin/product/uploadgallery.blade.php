@extends('admin.layout.layout')
@section('contents')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>UPLOAD GALLERY</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Product</a></li>
            <li class="breadcrumb-item active">Upload Gallery</li>
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
        </div>
      <div class="card-body p-0">
        <form action="{{route('process-upload-gallery',$product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                @if ($error = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <strong>{{ $error }}</strong>
                    </div>
                    <br>
                @endif
                @if ($success = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <strong>{{ $success }}</strong>
                    </div>
                    <br>
                @endif
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <h4><label for="name">{{$product->name}}</label></h4>
                        </div>
                    </div>
                </div>
                <div class="row d-flex">
                    @foreach ($images as $image)
                        <img class="img-thumbnail w-25" src="{{asset('images/gallery/'.$image->image)}}" alt="">
                    @endforeach
                </div>
                <div class="form-group">
                    <label class="form-label" for="image">Image</label>
                    <div class="custom-file">
                        <input type="file"  name="gallery[]" multiple class="custom-file-input" id="image"/>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <div>
                    <input type="submit"  value="Upload" class="btn btn-primary">
                </div>
              </div>

            </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->   
@endsection
@section('my-scripts')
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>
@endsection

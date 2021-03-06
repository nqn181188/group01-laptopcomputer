@extends('admin.layout.layout')
@section('contents')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Insert New Brand</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.brand.index')}}">Brand</a></li>
            <li class="breadcrumb-item active">Insert Brand</li>
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
        <form id="insert-brand-form"  action="{{route('admin.brand.store')}}" method="POST" enctype="multipart/form-data">
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
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="name">Brand Name<span class="text-danger">*</span></label>
                            <input type="text" id="name" class="form-control" name="brand">
                            <div id="brandErr" class="text-danger font-italic errMessager"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <input type="hidden" id='check-image' value='0'>
                            <label class="form-label" for="image">Image<span class="text-danger">*</span></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                                <div id="imageErr" class="text-danger font-italic errMessager"></div>
                            </div>
                        </div>
                    </div>
                </div class="d-inline">
                    <input type="submit" onclick="return validateInsertBrandForm()" value="Insert" class="btn btn-primary">
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
    
    

    </script>
@endsection

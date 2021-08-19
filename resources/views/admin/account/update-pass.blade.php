@extends('admin.layout.layout')

@section('contents')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Update Account</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Account</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    @if ($errors->any()) 
        <!--hiển thị thông báo lỗi-->  
        <div class="card">
            <div class="card-body">
                <ul class='error'>
                    {{-- @foreach($errors->all() as $err)
                    <li class="text-danger">{{ $err }}</li>
                    @endforeach --}}
                </ul>
            </div>
        </div>
    @endif
    <!-- end - hiển thị thông báo lỗi-->  
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Update Pass</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
        <div class="card-body">
          <form action="{{route('admin.account.update-pass',$user->id)}}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
            @method('put')
            @csrf         
            <div class="row ">
                <div class="col-md-12">
                    <div class="main-card mb-3  card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <h4>Change Password</h4>
                            </h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mt-3">
                                        <label for="current_password">Old password</label>
                                        <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required
                                            placeholder="Enter current password">
                                        @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mt-3">
                                        <label for="new_password ">new password</label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required
                                            placeholder="Enter the new password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mt-3">
                                        <label for="confirm_password">confirm password</label>
                                        <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"required placeholder="Enter same password">
                                        @error('confirm_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex justify-content-first mt-4 ml-2">
                                    <button type="submit" class="btn btn-primary"
                                        id="formSubmit">change password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
        </div>
    </div>
  </section>
  <!-- /.content -->
@endsection
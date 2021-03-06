@extends('admin.layout.layout')

@section('contents')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create Account</h1>
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
                    @foreach($errors->all() as $err)
                    {{-- <div class="alert alert-danger"> --}}
                      <li class="text-danger">{{ $err }}</li>
                    {{-- </div>  --}}
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <!-- end - hiển thị thông báo lỗi-->  
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Create Admin Account</h3>

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
            <form action="{{ route('admin.account.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="firstname">First name <span style="color: red">*</span></label>
                    <input type="text" id="firstname" value="{{ old('firstname')}}" name="firstname" class="form-control"/>
                </div>
                <div class="form-group">
                  <label for="lastname">Last name <span style="color: red">*</span></label>
                  <input type="text" id="lastname" value="{{ old('lastname')}}" name="lastname" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="password">Password <span style="color: red">*</span></label>
                    <input type="password" id="password" name="password" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="confirm">Confirm <span style="color: red">*</span></label>
                    <input type="password" id="confirm" name="confirm" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="email">Email <span style="color: red">*</span></label>
                    <input type="text" id="email" value="{{ old('email')}}" name="email" class="form-control"/>
                </div>
                <div ><span id="messageEmail"  class="text-danger"></span></div>
                <div class="form-group">
                  <label for="address">Address <span style="color: red">*</span></label>
                  <input type="text" id="address" value="{{ old('address')}}" name="address" class="form-control"/>
                </div>
                <div class="form-group">
                  <label for="role">Role <span style="color: red">*</span></label>
                  
                  <select id="role" name="role" class="form-control">
                    <option value="">Choose</option>
                    <option value="1">Admin</option>
                    <option value="2">Manager</option>
                  </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="btnCreate" value="Create" class="btn btn-primary"/>
                </div>
            </form>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
@endsection

@section('myscripts')
{{--     
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $(document).ready(function(){

    $("#email").keyup(function(){
        emailInput = $(this).val();
        
        $.ajax({
        type:'get',
        url:'{{ route('admin.check-email') }}',
        data:{ email:emailInput },
        success:function(data){
            // alert(data);
            if(data==1){
                $("#messageEmail").html('Email is exist');
            }else{
                $("#messageEmail").html('');
            }
        }
        });

    });

    });
</script> --}}

@endsection
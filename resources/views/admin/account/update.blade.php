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
                    @foreach($errors->all() as $err)
                    {{-- <div class="alert alert-danger">
                      <li>{{ $err }}</li>
                    </div>  --}}
                    <li class="text-danger">{{ $err }}</li>

                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <!-- end - hiển thị thông báo lỗi-->  
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Update Profile</h3>

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
          <form action="{{ route('admin.account.update',  $account->id) }}" method="POST">
            @method('put')
            <input type="hidden" name="id" value="{{ $account->id}}">
            @csrf
            <div class="form-group">
                <label for="firstname">First name</label>
                <input type="text" id="firstname" value="{{ old('firstname',$account->firstname)}}" name="firstname" class="form-control"/>
            </div>
            <div class="form-group">
              <label for="lastname">Last name</label>
              <input type="text" id="lastname" value="{{ old('lastname',$account->lastname)}}" name="lastname" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" value="{{ old('email',$account->email)}}" name="email" class="form-control"/>
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" id="address" value="{{ old('address',$account->address)}}" name="address" class="form-control"/>
            </div>
            <div class="form-group">
              <label for="role">Role</label>
              
              <select id="role" name="role" class="form-control">
                <option value="">Choose</option>
                <option value="1"  @if ( $account->role == 1)
                  selected
                @endif>Admin</option>
                <option value="2" @if ( $account->role == 2)
                  selected
                @endif>Manager</option>
              </select>
            </div>
            <div class="form-group">
                <input type="submit" name="btnUpdate" value="Update" class="btn btn-primary"/>
            </div>
          </form>
      </div>
    </div>
   
    

   

   
  </section>
  <!-- /.content -->
@endsection
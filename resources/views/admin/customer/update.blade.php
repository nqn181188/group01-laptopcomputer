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
                    </div>     --}}
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
        <h3 class="card-title">Update Account</h3>

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
            <form action="{{ route('admin.customer.update',  $customer->id) }}" method="POST">
              @method('put')
              <input type="hidden" name="id" value="{{ $customer->id}}">
              @csrf
              <div class="form-group">
                  <label for="firstname">First name</label>
                  <input type="text" id="firstname" value="{{ old('firstname',$customer->firstname)}}" name="firstname" class="form-control"/>
              </div>
              <div class="form-group">
                <label for="lastname">Last name</label>
                <input type="text" id="lastname" value="{{ old('lastname',$customer->lastname)}}" name="lastname" class="form-control"/>
              </div>
              {{-- <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" id="password" value="{{ old('password', $customer->password)}}" name="password" class="form-control"/>
              </div>
              <div class="form-group">
                  <label for="confirm">Confirm</label>
                  <input type="password" id="confirm" value="{{ $customer->password}}" name="confirm" class="form-control"/>
              </div> --}}
              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" id="email" value="{{ old('email',$customer->email)}}" name="email" class="form-control"/>
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" value="{{ old('address',$customer->address)}}" name="address" class="form-control"/>
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" value="{{ old('phone',$customer->phone)}}" name="phone" class="form-control"/>
              </div>
              <div class="form-group">
                <label for="role">Lock</label>
                
                <select id="lock" name="lock" class="form-control">
                  <option value="1"  @if ( $customer->lock == 1) selected  @endif>Lock</option>
                  <option value="0" @if ( $customer->lock == 0) selected @endif>Normal</option>
                </select>
              </div>
              <div class="form-group">
                  <input type="submit" name="btnUpdate" value="Update" class="btn btn-primary"/>
              </div>
          </form>
         
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
@endsection
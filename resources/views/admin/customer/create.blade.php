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
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <!-- end - hiển thị thông báo lỗi-->  
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Create Customer Account</h3>

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
            <form action="{{ route('admin.customer.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="firstname">First name</label>
                    <input type="text" id="firstname" name="firstname" class="form-control"/>
                </div>
                <div class="form-group">
                  <label for="lastname">Last name</label>
                  <input type="text" id="lastname" name="lastname" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="confirm">Confirm</label>
                    <input type="password" id="confirm" name="confirm" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control"/>
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" id="address" name="address" class="form-control"/>
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" id="phone" name="phone" class="form-control"/>
                </div>
                <div class="form-group">
                  <label for="role">Lock</label>
                  
                  <select id="role" name="role" class="form-control">
                    <option value="1">Lock</option>
                    <option value="0" selected>Normal</option>
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
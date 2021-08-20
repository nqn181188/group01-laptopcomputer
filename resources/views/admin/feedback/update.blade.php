@extends('admin.layout.layout')

@section('contents')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Feedback</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Customer Feedback</li>
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
        <h3 class="card-title">Customer Feedback</h3>

        <div class="card-tools">
          <a href="{{ route('admin.contact.create') }}"><i class="fas fa-user-plus"></i></a>
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('admin.contact.update',  $feedback->id) }}" method="POST">
              @method('put')
              <input type="hidden" name="id" value="{{$feedback->id}}">
              @csrf
              <div class="form-group">
                <label for="firstname">Firstname<span></span></label>
                <input type="text" value="{{$feedback->firstname}}" id="firstname" name="firstname" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label for="lastname">Lastname<span></span></label>
                <input type="text" value="{{$feedback->lastname}}" id="lastname" name="lastname" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label for="email">Email<span></span></label>
              <input type="text" value="{{$feedback->email}}" id="email" name="email" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label for="phone">Number Phone</label>
                <input type="text" value="{{$feedback->phone}}" id="phone" name="phone" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label for="comment">Comment</label>
                <div class="alert alert-light" role="alert">
                  <p>{{$feedback->comment}}</p>
                </div>
              </div>
              
              <div class="form-group">
                <label for="note">Note</label>
              <input type="text" id="note" name="note" 
                value="@if($feedback->note){{$feedback->note}}
                @endif" class="form-control">
              </div>
              <div class="form-check form-check-inline">
                <input id="read" class="form-check-input" type="checkbox" name="read" value="1"
                  @if ($feedback->read)
                      checked
                  @endif 
                >
                <label for="read" class="form-check-label">Read</label>
              </div>
              <div class="form-group">
                <input type="submit" name="btnOk" value="Ok" class="btn btn-primary"/>
              </div>
            </form>
          </div>
        </div>
        
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
@endsection
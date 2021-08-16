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
        <form action="{{ route('admin.contact.update',  $feedback->id) }}" method="POST">
          @method('put')
          <input type="hidden" name="id" value="{{ $feedback->id}}">
          @csrf

          <label for="firstname">Firstname<span></span></label>
          <input type="text" value="{{$feedback->firstname}}" id="firstname" name="firstname" readonly>

          <label for="lastname">Lastname<span></span></label>
          <input type="text" value="{{$feedback->lastname}}" id="lastname" name="lastname" readonly>

          <label for="email">Email<span></span></label>
          <input type="text" value="{{$feedback->email}}" id="email" name="email" readonly>

          <label for="phone">Number Phone</label>
          <input type="text" value="{{$feedback->phone}}" id="phone" name="phone" readonly>

          <label for="comment">Comment</label>
          <textarea name="comment" value="{{$feedback->comment}}" id="comment" readonly></textarea>

          <label for="read">Read</label>
          <input type="checkbox" id="read" name="read" 
                  @if ($feedback->read)
                      checked
                  @endif>

          <label for="note">Note</label>
          <input type="text" id="note" name="note" 
            value="@if ($feedback->note)
                {{$feedback->note}}
            @endif">
        </form>
        

       
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
@endsection
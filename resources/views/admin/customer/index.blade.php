@extends('admin.layout.layout')

@section('contents')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Account</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Customer account</li>
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
        <h3 class="card-title">Customer Account</h3>

        <div class="card-tools">
          <form style="display:inline-block" id="filter-customer">
          <div class="d-inline px-2">
            <div class="form-check-inline use-chosen">
              <label class="form-check-label pt-2">
                <input {{$lock==1?'checked':''}} name="lock" type="checkbox" class="form-check-input" value="1">Locked
              </label>
            </div>
          </div>
          </form>
          <a href="{{ route('admin.customer.create') }}"><i class="fas fa-user-plus"></i></a>
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                  <th>First name</th>
                  <th>Last name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Lock</th>
                  <th>Actions</th>
                </tr>
            </thead>
            <tbody>
              @foreach($customers as $item)
              <tr>
                <td>{{ $item->firstname }}</td>
                <td>{{ $item->lastname }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->phone }}</td>
                <td>
                  @if ( $item->lock == 1)
                    Lock
                  @else
                      Normal
                  @endif
                </td>
                <td>
                  <a href="{{ route('admin.customer.edit', $item->id) }}" class="btn btn-primary">Update</a>
                  {{-- <a href="{{ route('admin.order-history', $item->id) }}" class="btn btn-primary">Order History</a> --}}
                  {{-- <form style="display:inline-block" action="{{ route('admin.customer.destroy', $item->id) }}" method="POST">
                    @method("DELETE")
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                  </form> --}}
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <nav class="mt-3" aria-label="...">
        <ul class="pagination justify-content-center">
            <li class="page-item {{$customers->currentPage()==1?'disabled':''}}">
                <a href="{{request()->fullUrlWithQuery(['page' => 1]) }} " class="page-link">First</a>
            </li>
            <li class="page-item {{$customers->currentPage()==1?'disabled':''}}">
                <a href="{{request()->fullUrlWithQuery(['page' => $customers->currentPage()-1])}}" class="page-link">Previous</a>
            </li>
            @for ($i = 1; $i<=$customers->lastPage(); $i++)
              <li class="page-item {{$customers->currentPage()==$i?'active':''}}" ><a class="page-link" href="{{request()->fullUrlWithQuery(['page' => $i])}}">{{$i}}</a></li>
            @endfor
            <li class="page-item {{$customers->currentPage()==$customers->lastPage()?'disabled':''}}">
              <a href="{{request()->fullUrlWithQuery(['page' => $customers->currentPage()+1])}}" class="page-link">Next</a>
            </li>
            <li class="page-item {{$customers->currentPage()==$customers->lastPage()?'disabled':''}}">
              <a href="{{request()->fullUrlWithQuery(['page' => ceil($customers->total()/11)])}}" class="page-link">Last</a>
            </li>
        </ul>
        <p class="text-center text-secondary">Showing {{($customers->currentPage()-1)*11+1}}-{{($customers->currentPage()-1)*11+$customers->count()}} of {{$customers->total()}}</p>
      </nav>
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
@endsection


@section('my-scripts')
    
@section('my-scripts')
<script type="text/javascript">
  $(function(){
      $('.use-chosen').change(function(){
          $('#filter-customer').submit();
      });
  });
</script>

@if (Session::has('success_delete'))
<script>
    swal("Success Delete","{!! Session::get('success_delete') !!}", "success",{
        button: "Close"
    });
</script>
@endif


@if (Session::has('success_update'))
<script>
    swal("Update account success","{!! Session::get('success_update') !!}", "success",{
        button: "OK"
    });
</script>
@endif


@if (Session::has('success_create'))
<script>
    swal("Create account success","{!! Session::get('success_create') !!}", "success",{
        button: "OK"
    });
</script>
@endif

@endsection

@extends('admin.layout.layout')

@section('contents')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Customer</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Contact</li>
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
        <h3 class="card-title">Contact</h3>
       
        <div class="card-tools">
          <form style="display:inline-block" id="filter-feedback">

            {{-- <input type="hidden" value={{$custFb->currentPage()}} name="page"> --}}
          <div class="d-inline px-2">
            <div class="form-check-inline use-chosen">
              <label class="form-check-label pt-2">
                <input {{$read==1?'checked':''}} name="read" type="checkbox" class="form-check-input" value="1">read
              </label>
            </div>
          </div>
          </form>
          

          <a href="{{ route('admin.account.create') }}"><i class="fas fa-user-plus"></i></a>
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">

        <div class="card-body pb-0">
          <div class="row">
            @foreach($custFb as $item)
            <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  {{ $item->firstname }}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{ $item->lastname }}</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> {{  substr($item->comment,0,17) }}@if (strlen($item->comment)>16)...@endif</p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Email Address: {{ $item->email }}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{ $item->phone }}</li>
                      </ul>
                    </div>
                    @if ($item->note)
                    <div class="col-5 text-center">
                      <h5><b>Check note</b></h1>
                      <p>{{  substr($item->note,0,20) }}@if (strlen($item->comment)>20)...@endif</p>
                      {{-- <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid"> --}}
                    </div>
                    @endif
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    
                  <form style="display:inline-block" action="{{ route('admin.contact.destroy', $item->id) }}" method="POST">
                    @method("DELETE")
                    @csrf
                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                  </form>
                    
                      {{-- <i class="fas fa-comments"></i> --}}
                      
                    </a>
                    <a href="{{ route('admin.contact.edit', $item->id) }}" class="btn btn-sm btn-primary">
                      @if($item->read)
                      <i class="fas fa-check"></i><span class="badge badge-success"></span>
                      @endif
                      Check</a>
                    {{-- <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> Detail
                    </a> --}}
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          
        </div>

        <!-- /.card-body -->
        <nav class="mt-3" aria-label="...">
          <ul class="pagination justify-content-center">
              <li class="page-item {{$custFb->currentPage()==1?'disabled':''}}">
                  <a href="{{request()->fullUrlWithQuery(['page' => 1]) }} " class="page-link">First</a>
              </li>
              <li class="page-item {{$custFb->currentPage()==1?'disabled':''}}">
                  <a href="{{request()->fullUrlWithQuery(['page' => $custFb->currentPage()-1])}}" class="page-link">Previous</a>
              </li>
              @for ($i = 1; $i<=$custFb->lastPage(); $i++)
                <li class="page-item {{$custFb->currentPage()==$i?'active':''}}" ><a class="page-link" href="{{request()->fullUrlWithQuery(['page' => $i])}}">{{$i}}</a></li>
              @endfor
              <li class="page-item {{$custFb->currentPage()==$custFb->lastPage()?'disabled':''}}">
                <a href="{{request()->fullUrlWithQuery(['page' => $custFb->currentPage()+1])}}" class="page-link">Next</a>
              </li>
              <li class="page-item {{$custFb->currentPage()==$custFb->lastPage()?'disabled':''}}">
                <a href="{{request()->fullUrlWithQuery(['page' => ceil($custFb->total()/12)])}}" class="page-link">Last</a>
              </li>
          </ul>
          <p class="text-center text-secondary">Showing {{($custFb->currentPage()-1)*12+1}}-{{($custFb->currentPage()-1)*12+$custFb->count()}} of {{$custFb->total()}}</p>
      </nav>
  
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
@endsection


@section('my-scripts')
<script type="text/javascript">
  $(function(){
      $('.use-chosen').change(function(){
          $('#filter-feedback').submit();
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
    swal("Update success","{!! Session::get('success_update') !!}", "success",{
        button: "OK"
    });
</script>
@endif

@endsection


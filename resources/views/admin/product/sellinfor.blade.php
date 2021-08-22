@extends('admin.layout.layout')
@section('contents')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Selling Information</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Selling Information</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
        {{-- <div class="card-header bg-dark">
            <form id="filter-products" class="form-inline bg-dark">
              <input type="hidden" value={{$products->currentPage()}} name="page">
              <div class="row mx-auto">
                  <div class="d-inline use-chosen">
                    <input name="name" type="text" class="form-control search-name" value="{{$name}}" id="name" placeholder="Search by name...">
                  </div>
                  <div class="d-inline px-2">
                    <select class="form-control use-chosen" name="brand_id">
                      <option value=''>Brand</option>
                      @foreach ($brands as $brand)
                        <option {{$brand->id==$brand_id?'selected':''}} value='{{$brand->id}}'>{{$brand->brand}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="d-inline px-2">
                    <select class="form-control use-chosen" name="price">
                      <option value="">Price</option>
                      <option {{$price=='0'?'selected':''}} value='0'>$0 - $500</option>
                      <option {{$price=='500'?'selected':''}} value='500'>$500 - $1000</option>
                      <option {{$price=='1000'?'selected':''}} value='1000'>$1000 - $1500</option>
                      <option {{$price=='1500'?'selected':''}} value='1500'>$1500 - $2000</option>
                      <option {{$price=='2000'?'selected':''}} value='2000'>$2000+</option>
                    </select>
                  </div>
                  <div class="d-inline px-2">
                    <select class="form-control use-chosen" name="sortby">
                      <option value=''>Sort by</option>
                      <option {{$sortby=='price-asc'?'selected':''}} value='price-asc'>Sort by price: Low to High</option>
                      <option {{$sortby=='price-desc'?'selected':''}} value='price-desc'>Sort by price: High to Low</option>
                      <option {{$sortby=='name-asc'?'selected':''}} value='name-asc'>Sort by name : A-Z</option>
                      <option {{$sortby=='name-desc'?'selected':''}} value='name-desc'>Sort by name : Z-A</option>
                      <option {{$sortby=='quantity-asc'?'selected':''}} value='quantity-asc'>Sort by quantity : Low to High</option>
                      <option {{$sortby=='quantity-desc'?'selected':''}} value='quantity-desc'>Sort by quantity : Hight to Low</option>
                      <option {{$sortby=='newest'?'selected':''}} value='newest'>Sort by date : Newest to Oldest</option>
                      <option {{$sortby=='oldest'?'selected':''}} value='oldest'>Sort by date : Oldest to Newest</option>
                    </select>
                  </div>
                  <div class="d-inline px-2">
                    <select class="form-control use-chosen" name="paginate">
                      <option {{$paginate=='6'?'selected':''}} value='6'>6 per page</option>
                      <option {{$paginate=='12'?'selected':''}} value='12'>12 per page</option>
                      <option {{$paginate=='18'?'selected':''}} value='18'>18 per page</option>
                      <option {{$paginate=='24'?'selected':''}} value='24'>24 per page</option>
                      <option {{$paginate=='36'?'sele   cted':''}} value='36'>36 per page</option>
                    </select>
                  </div>
                  <div class="d-inline px-2">
                    <div class="form-check-inline use-chosen">
                      <label class="form-check-label pt-2">
                        <input {{$featured==1?'checked':''}} name="featured" type="checkbox" class="form-check-input" value="1">Featured
                      </label>
                    </div>
                  </div>
              </div>
            </form>
        </div>
         --}}
      <div class="card-body p-0">
        <table class="table table-striped project ">
          <thead class="thead-dark">
            <tr>
              <th class="text-center align-middle" style="width: 5%">Roll Number</th>
              <th class="text-center align-middle" style="width: 15%">Image</th>
              <th class="text-center align-middle" style="width: 35%">Name</th>
              <th class="text-center align-middle" style="width: 5%">Price</th>
              <th class="text-center align-middle" style="width: 5%">Quantity</th>
              <th class="text-center align-middle" style="width: 5%">Sold</th>
            </tr>
          </thead>
          <tbody>
            @php
                $count=1;
            @endphp
            @foreach ($sellinfors as $item)
              <tr>
                <td class="text-center align-middle">
                  <span>{{$count++}}</span>
                </td>
                <td>
                    @if($item['image']!=null)
                    <img class="d-block mx-auto" src="{{asset('/images/products/'.$item['image'])}}" alt="{{$item['image']}}" style="width: 50%">
                    @endif
                </td>
                <td class="align-middle">{{$item['name']}}</td>
                <td class="text-center align-middle">{{number_format($item['price'], 2, '.', ',')}}</td>
                <td class="text-center align-middle">{{$item['quantity']}}</td>
                <td class="text-center align-middle">{{$item['sold']}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{-- <nav class="mt-3" aria-label="...">
            <ul class="pagination justify-content-center">
                <li class="page-item {{$products->currentPage()==1?'disabled':''}}">
                    <a href="{{request()->fullUrlWithQuery(['page' => 1]) }} " class="page-link">First</a>
                </li>
                <li class="page-item {{$products->currentPage()==1?'disabled':''}}">
                    <a href="{{request()->fullUrlWithQuery(['page' => $products->currentPage()-1])}}" class="page-link">Previous</a>
                </li>
                @for ($i = 1; $i<=$products->lastPage(); $i++)
                  <li class="page-item {{$products->currentPage()==$i?'active':''}}" ><a class="page-link" href="{{request()->fullUrlWithQuery(['page' => $i])}}">{{$i}}</a></li>
                @endfor
                <li class="page-item {{$products->currentPage()==$products->lastPage()?'disabled':''}}">
                  <a href="{{request()->fullUrlWithQuery(['page' => $products->currentPage()+1])}}" class="page-link">Next</a>
                </li>
                <li class="page-item {{$products->currentPage()==$products->lastPage()?'disabled':''}}">
                  <a href="{{request()->fullUrlWithQuery(['page' => ceil($products->total()/$paginate)])}}" class="page-link">Last</a>
                </li>
            </ul>
            <p class="text-center text-secondary">Showing {{($products->currentPage()-1)*$paginate+1}}-{{($products->currentPage()-1)*$paginate+$products->count()}} of {{$products->total()}}</p>
        </nav> --}}
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
                $('#filter-products').submit();
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

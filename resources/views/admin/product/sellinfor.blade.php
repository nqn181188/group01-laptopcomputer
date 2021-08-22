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
        <div class="card-header bg-dark">
            <form id="filter-products" class="form-inline bg-dark">
              <input type="hidden" value={{$page}} name="page">
              <div class="row mx-auto">
                  <div class="d-inline px-2">
                    <select class="form-control use-chosen" name="sortby">
                      <option value=''>Sort by</option>
                      <option {{$sortby=='sold-asc'?'selected':''}} value='sold-asc'>Sort by Sold: Low to High</option>
                      <option {{$sortby=='sold-desc'?'selected':''}} value='sold-desc'>Sort by Sold: High to Low</option>
                      <option {{$sortby=='quantity-asc'?'selected':''}} value='quantity-asc'>Sort by Quantity : Low to High</option>
                      <option {{$sortby=='quantity-desc'?'selected':''}} value='quantity-desc'>Sort by Quantity : High to Low</option>
                    </select>
                  </div>
              </div>
            </form>
        </div>
        
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
                $count=($page-1)*12+1;
            @endphp
            @foreach ($show as $item)
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
      <nav aria-label="Page navigation example" class="mt-4">
          <ul class="pagination justify-content-center">
            <li class="page-item {{$page==1?'disabled':''}}"><a class="page-link" href="?page=1">First</a></li>
            <li class="page-item {{$page==1?'disabled':''}}"><a class="page-link" href="?page={{$page-1}}">Previous</a></li>
            @for ($i = 1; $i <= $totalPage; $i++)
              <li class="page-item {{$page==$i?'active':''}}"><a class="page-link" href="?page={{$i}}">{{$i}}</a></li>
            @endfor
            <li class="page-item {{$page==$totalPage?'disabled':''}}"><a class="page-link" href="?page={{$page+1}}">Next</a></li>
            <li class="page-item {{$page==$totalPage?'disabled':''}}"><a class="page-link" href="?page={{$totalPage}}">Last</a></li>

          </ul>
      </nav>  
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
@endsection

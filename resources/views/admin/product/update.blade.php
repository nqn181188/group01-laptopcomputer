@extends('admin.layout.layout')
@section('contents')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Product</a></li>
            <li class="breadcrumb-item active">Edit Product</li>
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
            <h3 class="card-title">Product</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
      <div class="card-body p-0">
            @if ($error = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <strong>{{ $error }}</strong>
                </div>
                <br>
            @endif
            @if ($success = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <strong>{{ $success }}</strong>
                </div>
                <br>
            @endif
        <form id="create-product-form"  action="{{route('admin.product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="name">Name<span class="text-danger">*</span></label>
                            <input type="text" id="name" class="form-control" name="name" value="{{$product->name}}">
                            <div id="nameErr" class="text-danger font-italic errMessager"></div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="ml-5" for="featured">Featured</label>
                            <input type="checkbox" id="featured" class="form-control" name="featured" value='1' class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="quantity">Quantity<span class="text-danger">*</span></label>
                            <input type="text" name="quantity" id="quantity" class="form-control" value="{{$product->quantity}}">
                            <div id="quantityErr" class="text-danger font-italic errMessager"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="price">Price<span class="text-danger">*</span></label>
                            <input type="text" name="price" id="price" class="form-control" value="{{$product->price}}">
                            <div id="priceErr" class="text-danger font-italic errMessager"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="brand">Brand<span class="text-danger">*</span></label>
                            <select name="brand_id" id="brand" class="custom-select">
                                <option value="">---Select Brand---</option>
                                @foreach ($brands as $brand)
                                <option {{$product->brand_id==$brand->id?'selected':''}} value="{{$brand->id}}">{{$brand->brand}}</option>
                                @endforeach
                            </select>
                            <div id="brandErr" class="text-danger font-italic errMessager"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="model">Model<span class="text-danger">*</span></label>
                            <input type="text" name="model" id="model" class="form-control" value="{{$product->model}}">
                            <div id="modelErr" class="text-danger font-italic errMessager"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" rows="5" id="description" name="description">{{$product->description}}</textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" id='check-image' value='1'>
                    <div>
                        <img style="width: 30%"  src="{{asset('images/products/'.$product->image)}}" alt="{{$product->name}}" class="img-thumbnail img-fluid">
                    </div>
                    <label class="form-label" for="image">Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image" value="{{$product->image}}">
                        <label class="custom-file-label" for="image">Choose another image</label>
                        <div id="imageErr" class="text-danger font-italic errMessager"></div>
                        @if(isset($errorUploadImage))
                        <div class="text-danger font-italic errMessager">{{$erroUploadImage}}</div>
                        @endif
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="cpu">CPU<span class="text-danger">*</span></label>
                            <input type="text" name="cpu" id="cpu" class="form-control" value="{{$product->cpu}}">
                            <div id="cpuErr" class="text-danger font-italic errMessager"></div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="amountofram">Amount of RAM (GB)<span class="text-danger">*</span></label>
                            <input type="text" name="amountofram" id="amountofram" class="form-control" value="{{$product->amountofram}}">
                            <div id="amountoframErr" class="text-danger font-italic errMessager"></div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="typeofram">Type of RAM<span class="text-danger">*</span></label>
                            <select name="typeofram" id="typeofram" class="custom-select">
                                <option value="">---Type of RAM---</option>
                                <option {{$product->typeofram=="DDR4"?'selected':''}} value="DDR4">DDR4</option>
                                <option {{$product->typeofram=="DDR3"?'selected':''}} value="DDR3">DDR3</option>
                                <option {{$product->typeofram=="DDR3L"?'selected':''}} value="DDR3L">DDR3L</option>
                                <option {{$product->typeofram=="LPDDR3"?'selected':''}} value="LPDDR3">LPDDR3</option>
                                <option {{$product->typeofram=="LPDDR4"?'selected':''}} value="LPDDR4">LPDDR4</option>
                            </select>
                            <div id="typeoframErr" class="text-danger font-italic errMessager"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="screensize">Screen Size (inches)<span class="text-danger">*</span></label>
                            <input type="text" name="screensize" id="screensize" class="form-control" value="{{$product->amountofram}}">
                            <div id="screensizeErr" class="text-danger font-italic errMessager"></div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="gcard">Graphic Card<span class="text-danger">*</span></label>
                            <input type="text" name="gcard" id="gcard" class="form-control" value="{{$product->amountofram}}">
                            <div id="gcardErr" class="text-danger font-italic errMessager"></div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="hdcapacity">Hard Driver Capacity<span class="text-danger">*</span></label>
                            <input type="text" name="hdcapacity" id="hdcapacity" class="form-control" value="{{$product->amountofram}}">
                            <div id="hdcapacityErr" class="text-danger font-italic errMessager"></div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="hdtype">Hard Drive Type<span class="text-danger">*</span></label>
                            <select name="hdtype" id="hdtype" class="custom-select">
                                <option value=''>---Type of Hard Driver---</option>
                                <option {{$product->hdtype=="HDD"?'selected':''}} value="HDD">HDD</option>
                                <option {{$product->hdtype=="SSD"?'selected':''}} value="SSD">SSD</option>
                            </select>
                            <div id="hdtypeErr" class="text-danger font-italic errMessager"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="width">Width (mm)<span class="text-danger">*</span></label>
                            <input type="text" name="width" id="width" class="form-control" value="{{$product->width}}">
                            <div id="widthErr" class="text-danger font-italic errMessager"></div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="depth">Depth (mm)<span class="text-danger">*</span></label>
                            <input type="text" name="depth" id="depth" class="form-control" value="{{$product->depth}}">
                            <div id="depthErr" class="text-danger font-italic errMessager"></div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="height">Height (mm)<span class="text-danger">*</span></label>
                            <input type="text" name="height" id="height" class="form-control" value="{{$product->height}}">
                            <div id="heightErr" class="text-danger font-italic errMessager"></div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="weight">Weight (kg)<span class="text-danger">*</span></label>
                            <input type="text" name="weight" id="weight" class="form-control" value="{{$product->weight}}">
                            <div id="weightErr" class="text-danger font-italic errMessager"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label for="os">OS Information<span class="text-danger">*</span></label>
                            <input type="text" name="os" id="os" class="form-control" value="{{$product->os}}">
                            <div id="osErr" class="text-danger font-italic errMessager"></div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="releaseyear">Release Year<span class="text-danger">*</span></label>
                            <input type="text" name="releaseyear" id="releaseyear" class="form-control" value="{{$product->releaseyear}}">
                            <div id="releaseyearErr" class="text-danger font-italic errMessager"></div>
                        </div>
                    </div>
                </div>
                <div>
                    <input type="submit" onclick="return validateCreateProductForm()" value="Update" class="btn btn-primary">
                </div>
              </div>

            </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->   
@endsection
@section('my-scripts')
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>
@endsection

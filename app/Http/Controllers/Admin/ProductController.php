<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;
use File;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(REQUEST $request)
    {
        $paginate = $request->paginate??12 ;
        $page=$request->page;
        $brands = Brand::all();
        $name = $request->name??'';
        $brand_id = $request->brand_id??0;
        $price = $request->price??'';
        $sortby = $request->sortby??'';
        $featured = $request->featured??0;
        $products = Product::where('id','!=','0')->orderBy('created_at','desc');
        if($name){
            $products->where('name','like','%'.$name.'%');
        }
        if($brand_id){
            $products->where('brand_id',$brand_id);
        }
        if($price){
            switch($price){
                case '0' : $products->whereBetween('price',[0,500]); break;
                case '500' : $products->whereBetween('price',[500,1000]); break;
                case '1000' : $products->whereBetween('price',[1000,1500]); break;
                case '1500' : $products->whereBetween('price',[1500,2000]); break;
                case '2000' : $products->where('price','>=','2000'); break;
                default : $products=$products;
            }
        }
        if($sortby){
            switch($sortby){
                case 'price-asc' : $products->orderBy('price','asc'); break;
                case 'price-desc' : $products->orderBy('price','desc'); break;
                case 'name-asc' : $products->orderBy('name','asc'); break;
                case 'name-desc' : $products->orderBy('name','desc'); break;
                case 'newest' : $products->orderBy('created_at','desc'); break;
                case 'oldest' : $products->orderBy('created_at','asc'); break;
                default : $products->orderBy('created_at','desc');
            }
        }
        if($featured){
            $products->where('featured',1);
        }
        $products = $products->paginate($paginate);
        return view('admin.product.index', compact(
            'products',
            'brands',
            'paginate',
            'name',
            'brand_id',
            'price',
            'sortby',
            'featured',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('admin.product.create',compact(
            'brands',
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $request->all();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension = $file->getClientOriginalExtension();
            if($extension!='jpg'&&$extension!='jpeg'&&$extension!='png'){
                $erroUploadImage = 'Please choose the file with extension is jpg, jpeg or png';
                return redirect()->route('admin.product.create')->with(
                    'erroUploadImage',
                );
            }
            $imgName=$file->getClientOriginalName();
            $file->move('images/products',$imgName);
            $product['image']=$imgName;
        }
        Product::create($product);
        return redirect()->route('admin.product.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        return view('admin.product.update',compact(
            'product',
            'brands',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $product = Product::find($id);
        $product->name=$request->name;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->brand_id=$request->brand_id;
        $product->model=$request->model;
        $product->description=$request->description;
        $product->cpu=$request->cpu;
        $product->amountofram=$request->amountofram;
        $product->typeofram=$request->typeofram;
        $product->screensize=$request->screensize;
        $product->gcard=$request->gcard;
        $product->hdcapacity=$request->hdcapacity;
        $product->hdtype=$request->hdtype;
        $product->width=$request->width;
        $product->depth=$request->depth;
        $product->height=$request->height;
        $product->weight=$request->weight;
        $product->os=$request->os;
        $product->releaseyear=$request->releaseyear;
        if($request->hasFile('image')){
            if($product->image!=null){
                if(File::exists(public_path("images/products/$product->image"))){
                    File::delete(public_path("images/products/$product->image"));
                }
            }
            $file=$request->file('image');
            $extension = $file->getClientOriginalExtension();
            if($extension!='jpg'&&$extension!='jpeg'&&$extension!='png'){
                $item=Product::where('id',$id)->first();
                $erroUploadImage = 'Please choose the file with extension is jpg, jpeg or png';
                return redirect()->route('admin.product.edit',$item)->with(
                    'erroUploadImage',
                );
            }
            $imgName=$file->getClientOriginalName();
            $file->move('images/products',$imgName);
            $product['image']=$imgName;
        }
        $product->save();
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product){
        if($product->image!=null){
            if(File::exists(public_path("images/products/$product->image"))){
                File::delete(public_path("images/products/$product->image"));
            }
        }
            $product->delete();
            return redirect()->route('admin.product.index');
    }

}

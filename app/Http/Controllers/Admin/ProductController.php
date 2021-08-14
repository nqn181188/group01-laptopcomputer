<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;

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
        $new = $request->new??0;
        $products = Product::where('id','!=','0');
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
                default : $products=$products;
            }
        }
        if($featured){
            $products->where('featured',1);
        }
        if($featured){
            $products->where('created_at','desc')->limit(10);
        }
        $products = $products->paginate($paginate);
        return view('admin.product.index', compact(
            'products',
            'brands',
            'paginate',
            'page',
            'name',
            'brand_id',
            'price',
            'sortby',
            'featured',
            'new',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
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
                return redirect()->route('admin.account.create');
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
        return view('admin.product.update');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        {
            if($product->image!=null){
                if(file_exists(asset('/images/').$product->image)){
                    unlink(asset('/images/').$product->image);
                }
            }
            $product->delete();
            return redirect()->route('admin.product.index');
        }
    }
}

<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $paginate=$request->post_per_page??12;
        $brands=Brand::all();
        $rams = Product::select('amountofram')->distinct()->orderBy('amountofram','asc')->get();
        $hds = Product::select('hdcapacity','hdtype')->distinct()->orderBy('hdcapacity','asc')->get();
        $screensizes = Product::select('screensize')->distinct()->orderBy('screensize','asc')->get();
        $cputypes = Product::select('cputype')->distinct()->orderBy('cputype','asc')->get();
        $checked_brands=array();
        $checked_rams=array();
        $checked_hds=array();
        $checked_screensizes=array();
        $checked_gcards=array();
        $checked_cputypes=array();
        $checked_price='';

        $products = Product::where('id','!=',0);
        if($request->checked_brands){
            $checked_brands = $request->checked_brands;
            $products->whereIn('brand_id',$checked_brands);
        }
        if($request->checked_cputypes){
            $checked_cputypes = $request->checked_cputypes;
            $products->whereIn('cputype','like',$checked_cputypes);
        }
        if($request->checked_rams){
            $checked_rams = $request->checked_rams;
            $products->whereIn('amountofram',$checked_rams);
        }
        
        if($request->checked_hds){
            $checked_hds = $request->checked_hds;
            $products->whereIn('hdcapacity',$checked_hds);
        }
        if($request->checked_screensizes){
            $checked_screensizes = $request->checked_screensizes;
            $products->whereIn('screensize',$checked_screensizes);
        }
        if($request->checked_gcards){
            $checked_gcards = $request->checked_gcards;
            if(count($checked_gcards)==1){
                if ($checked_gcards[0]=='onboard'){
                    $products->where('gcard','like','%'.'intel'.'%');
                }else{
                    $products->where('gcard','like','%'.'nvidia'.'%');
                }
            }
        }
        if($request->checked_price!=''){
            $checked_price = $request->checked_price;
            // dd($checked_price);
            switch($checked_price){
                case '0' : $products->whereBetween('price',[0,500]); break;
                case '500' : $products->whereBetween('price',[500,1000]); break;
                case '1000' : $products->whereBetween('price',[1000,1500]); break;
                case '1500' : $products->whereBetween('price',[1500,2000]); break;
                case '2000' : $products->where('price','>=','2000'); break;
                default : $products=$products;
            }
        }
        $orderby='';
        if($request->orderby){
            $orderby=$request->orderby;
            switch ($orderby){
                case 'price-asc' : $products->orderBy('price','asc'); 
                case 'price-desc' : $products->orderBy('price','desc'); 
                case 'name-asc' : $products->orderBy('name','asc'); 
                case 'name-desc' : $products->orderBy('name','desc'); 
                case 'newest' : $products->orderBy('created_at','desc'); 
                case 'oldest' : $products->orderBy('created_at','asc'); 
                default : $products=$products;
            }
        }
        $products=$products->paginate($paginate);

        return view('shop.shop',compact(
            'products',
            'paginate',
            'orderby',
            'brands',
            'checked_brands',
            'rams',
            'checked_rams',
            'hds',
            'checked_hds',
            'screensizes',
            'checked_screensizes',
            'checked_gcards',
            'cputypes',
            'checked_cputypes',
            'checked_price',

        ));

    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }
}

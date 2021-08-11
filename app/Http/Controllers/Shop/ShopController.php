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
        $paginate=12;
        $brands=Brand::all();
        $rams = Product::select('amountofram')->distinct()->orderBy('amountofram','asc')->get();
        $hds = Product::select('hdcapacity','hdtype')->distinct()->orderBy('hdcapacity','asc')->get();
        $screensizes = Product::select('screensize')->distinct()->orderBy('screensize','asc')->get();
        $checked_brands=array();
        $checked_rams=array();
        $checked_hds=array();
        $checked_screensizes=array();

        $products = Product::where('id','!=',0)->orderBy('featured','desc');
        if($request->checked_brands){
            $checked_brands = $request->checked_brands;
            $products->whereIn('brand_id',$checked_brands);
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
        $orderby='';
        if($request->orderby){
            $orderby=$request->orderby;
            switch ($orderby){
                case 'price-asc' : $products->orderBy('price','asc');
                case 'price-desc' : $products->orderBy('price','desc');
                default : $products->orderBy('featured','desc');
            }
        }
        if($request->post_per_page){
            $paginate = $request->post_per_page;
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

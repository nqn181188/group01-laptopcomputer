<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\CustomerComment;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pids = Product::get(['id']);
        $rates = array();
        foreach($pids as $pid){
            $rate = CustomerComment::where('product_id',$pid->id)->sum('rate');
            $num = CustomerComment::where('product_id',$pid->id)->count();
            $rates["$pid->id"]=$num!=0?round($rate/$num):5;
        }
        $featuredProduct = Product::where('featured','1')->orderBy('updated_at','desc')->limit(20)->get();
        $lastestProduct = Product::orderBy('created_at','desc')->limit(20)->get();
        $brands = Brand::all();
        $products = Product::all();
        return view('shop.home',compact(
            'featuredProduct',
            'lastestProduct',
            'products',
            'brands',
            'rates',
        ));
    }
    public function searchproduct(REQUEST $request){
        $paginate=$request->paginate??12;
        $searchname = $request->search;
        $searchproducts = Product::where('name','like','%'.$searchname.'%');
        $orderby='';
        if($request->orderby){
            $orderby=$request->orderby;
            switch ($orderby){
                case 'price-asc' : $searchproducts->orderBy('price','asc');
                break;
                case 'price-desc' : $searchproducts->orderBy('price','desc');
                break;
                default: $searchproducts->orderBy('featured','desc');
            }
        }
        if($request->post_per_page){
            $paginate = $request->post_per_page;
        }
        $searchproducts=$searchproducts->paginate($paginate);
        $featuredProduct = Product::where('featured','1')->orderBy('updated_at','desc')->limit($paginate)->get();
        $pids = Product::get(['id']);
        $rates = array();
        foreach($pids as $pid){
            $rate = CustomerComment::where('product_id',$pid->id)->sum('rate');
            $num = CustomerComment::where('product_id',$pid->id)->count();
            $rates["$pid->id"]=$num!=0?round($rate/$num):5;
        }
        return view('shop.searchproduct',compact(
            'searchproducts',
            'featuredProduct',
            'paginate',
            'searchname',
            'orderby',
            'rates'
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

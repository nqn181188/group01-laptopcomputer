<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featuredProduct = Product::where('featured','1')->orderBy('updated_at','desc')->limit(20)->get();
        $lastestProduct = Product::where('featured','1')->orderBy('created_at','desc')->limit(20)->get();
        $acer = Product::where('brand_id','1')->get();
        $asus = Product::where('brand_id','2')->get();
        $dell = Product::where('brand_id','3')->get();
        $hp = Product::where('brand_id','4')->get();
        $lenovo = Product::where('brand_id','5')->get();
        $macbook = Product::where('brand_id','6')->get();
        return view('shop.home',compact(
            'featuredProduct',
            'lastestProduct',
            'acer',
            'asus',
            'dell',
            'hp',
            'lenovo',
            'macbook',
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

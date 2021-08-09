<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductDetailController extends Controller
{
    public function index($id){
        $product = Product::find($id);
        $relatedProduct = Product::where('brand_id',$product->brand_id)->get();
        $featuredProduct = Product::where('featured','1')->orderBy('updated_at','desc')->get();
        return view('shop.productdetail',compact(
            'product',
            'relatedProduct',
            'featuredProduct',
        ));
    }
}

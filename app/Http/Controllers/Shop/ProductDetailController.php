<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CustomerComment;

class ProductDetailController extends Controller
{
    public function index($id){
        $product = Product::find($id);
        $relatedProduct = Product::where('brand_id',$product->brand_id)->get();
        $featuredProduct = Product::where('featured','1')->orderBy('updated_at','desc')->limit(5)->get();
        return view('shop.productdetail',compact(
            'product',
            'relatedProduct',
            'featuredProduct',
        ));
    }
    public function comment(REQUEST $request){
        $comment = $request->all();
        $id = $request->product_id;
        CustomerComment::create($comment);
        return redirect()->route('product-detail',$id)->with(
            'id',
        );

    }
}

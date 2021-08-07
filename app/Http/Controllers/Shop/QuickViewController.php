<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
class QuickViewController extends Controller
{
    public function quickview(REQUEST $request){
        $product_id = $request->product_id;
        $product = Product::where('id',$product_id)->first();
        $product_image= ProductImage::where('product_id',$product_id);
        $output['product_image']='';
        foreach($product_image as $p_image){
            $output['product_image'].=$p_image->image;
        }
        $output['name']=$product->name;
        $output['price']=$product->price;
        $output['image']=$product->image;
        $output['cpu']=$product->cpu;
        $output['ram']=$product->amountofram.'GB '.$product->typeofram;
        $output['screensize']=$product->screensize.'"';
        $output['gcard']=$product->gcard;
        $output['hd']=$product->hdcapacity.'GB '.$product->hdtype;
        $output['dimension']=$product->width.'x'.$product->depth.'x'.$product->height;
        $output['weight']=$product->weight;
        $output['os']=$product->os;
        $output['releaseyear']=$product->releaseyear;
        echo json_encode($output);
    }
}

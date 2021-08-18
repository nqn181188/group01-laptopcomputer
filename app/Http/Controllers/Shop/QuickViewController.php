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
        $output['avail']='';
        foreach($product_image as $p_image){
            $output['product_image'].=$p_image->image;
        }
        $output['avail']=$product->quantity>0?'In Stock':'Out Of Stock';
        $output['name']=$product->name;
        $output['price']='$'.number_format($product->price, 0, '.', ',');
        $output['image']= '<img src="images/products/'.$product->image.'" alt="">';

        $output['cpu']=$product->cpu;
        $output['ram']=$product->amountofram.'GB '.$product->typeofram;
        $output['screensize']=$product->screensize.'"';
        $output['gcard']=$product->gcard;
        $output['hd']=$product->hdcapacity.' GB '.$product->hdtype;
        $output['dimension']=$product->width.' x '.$product->depth.' x '.$product->height.' (mm)';
        $output['weight']=$product->weight. ' kg';
        $output['os']=$product->os;
        $output['releaseyear']=$product->releaseyear;
        
        
      

        echo json_encode($output);
    }
}

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
        $output['price']='$'.$product->price;
        $output['image']=$product->image;
        $output['cpu']='CPU: '.$product->cpu;
        $output['ram']='RAM: '.$product->amountofram.'GB '.$product->typeofram;
        $output['screensize']='SCREEN SIZE: '.$product->screensize.'"';
        $output['gcard']='GRAPHIC CARD: '.$product->gcard;
        $output['hd']='HARD DRIVER: '.$product->hdcapacity.' GB '.$product->hdtype;
        $output['dimension']='DIMENSION: '.$product->width.' x '.$product->depth.' x '.$product->height.' (mm)';
        $output['weight']='WEIGHT: '.$product->weight. ' kg';
        $output['os']='OS: '.$product->os;
        $output['releaseyear']='RELEASE YEAR: '.$product->releaseyear;
        echo json_encode($output);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(REQUEST $request)
    {
        $search = $request->search??'';
        $status = $request->status??0;        
        $orders = Order::orderBy('created_at','desc');
        if($search){
            $orders->where('ordernumber','like','%'.$search.'%');
        }
        if($status){
            $orders->where('status',$status);
        }
        $orders=$orders->paginate(12);
        $total = Order::all()->count();
        $inprocess = Order::where('status',1)->count();
        $shipping = Order::where('status',2)->count();
        $shipped = Order::where('status',3)->count();
        $canceled = Order::where('status',4)->count();
        return view('admin.order.index', compact(
            'orders',
            'search',
            'status',
            'total',
            'inprocess',
            'shipping',
            'shipped',
            'canceled'
        ));
    }

    // public function orderHistoty($cust_id){
    //     $orders = Order::where('cust_id',$cust_id);
    //     return view('admin.customer.order-history', compact('orders'));
    // }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ordernumber)
    {
        $billInfor = Order::where('ordernumber',$ordernumber)->first();
        $shipInfor = OrderDetail::where('ordernumber',$ordernumber)->distinct()->first();
        $shipProducts = OrderDetail::where('ordernumber',$ordernumber)->get();
        $orderProducts = array();
        
        foreach ($shipProducts as $shipProduct){
            $productOrderDetail = array(); 
            $product = Product::where('id',$shipProduct->product_id)->first();
            $productOrderDetail['name']=$product->name;
            $productOrderDetail['image']= $product->image;
            $productOrderDetail['quantity']= $shipProduct->quantity;
            $productOrderDetail['price']= $shipProduct->price;
            $orderProducts[]= $productOrderDetail;
        }
        $totalPrice =0;
        foreach ($orderProducts as $orderProduct ){
            $totalPrice += $orderProduct['quantity']*$orderProduct['price'];
        }
        return view('admin.order.orderdetail',compact(
            'billInfor',
            'shipInfor',
            'orderProducts',
            'totalPrice',
        ));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
        
            // if($order->id!=null){
            //     if(file_exists(asset('/images/').$product->image)){
            //         unlink(asset('/images/').$product->image);
            //     }
            // }
            $order->delete();
            return redirect()->route('admin.order.index');
        
    }
   
}

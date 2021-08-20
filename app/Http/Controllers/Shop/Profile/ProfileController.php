<?php

namespace App\Http\Controllers\Shop\Profile;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= session()->get('user');
        
        // dd($userId);
        $orders = Order::where('cust_id',$user->id)->orderBy('created_at','desc')->get();
        return view('shop.profile.order-history', compact('orders'));
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
     * @param  \App\Models\Customer  $customer
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
        return view('shop.profile.orderdetail',compact(
            'billInfor',
            'shipInfor',
            'orderProducts',
            'totalPrice',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('shop.profile.update-my-account', compact('customer'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $validator = Validator::make($request->all(),[
            'email'    => 'email|unique:customers,email,'.$customer->id,
            'phone' => 'required|regex:/(0)[0-9]{9}/',
        ]);

        if( $validator->fails() ){
            return redirect()->back()->
            withErrors($validator)->withInput();
        }
        $customer->email  = $request->email;
        $customer->phone  = $request->phone;
        $customer->address  = $request->address;
        $customer->save();
        return redirect()->route('home')->with(['change_profile'=>'Update profile success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}

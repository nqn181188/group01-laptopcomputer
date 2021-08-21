<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class PaymentController extends Controller
{
    public function chosenPayment(REQUEST $request){
        $billInfor = array();
        $shipInfor = array();
        $billInfor['fname']  = $request->fname;
        $billInfor['lname']  = $request->lname;
        $billInfor['email']  = $request->email;
        $billInfor['phone']  = $request->phone;
        $billInfor['add']  = $request->add;
        $shipInfor['sfname']  = $request->sfname;
        $shipInfor['slname']  = $request->slname;
        $shipInfor['semail']  = $request->semail;
        $shipInfor['sphone']  = $request->sphone;
        $shipInfor['sadd']  = $request->sadd;
        $request->session()->put('billInfor', $billInfor);
        $request->session()->put('shipInfor', $shipInfor);
        $checked_payment=$request->checked_payment;
        if($checked_payment=='paypal'){
            return redirect()->route('paypal-checkout');
        }
    }
    public function saveOrder(REQUEST $request){
        $orders = Order::get('ordernumber');
        $nums=array();
        foreach($orders as $order){
            $nums[]=$order->ordernumber;
        }
        $ordernumber = str_shuffle('0123456789');
        while(in_array($ordernumber,$nums)){
            $ordernumber = str_shuffle('0123456789');
        }
        $order = new Order;
        $order->ordernumber = $ordernumber;
        $order->cust_id = $request->session()->get('user')->id;
        $order->order_date = \Carbon\Carbon::now();
        $order->firstname =  $request->session()->get('billInfor')['fname'];
        $order->lastname =  $request->session()->get('billInfor')['lname'];
        $order->email =  $request->session()->get('billInfor')['email'];
        $order->phone =  $request->session()->get('billInfor')['phone'];
        $order->address =  $request->session()->get('billInfor')['add'];
        $order->status =  1;
        $order->save();
        foreach($request->session()->get('cart') as $cartitem){
            $orderdetail = new OrderDetail;
            $orderdetail->ordernumber = $ordernumber;
            $orderdetail->product_id = $cartitem->id;
            $orderdetail->price = $cartitem->price;
            $orderdetail->quantity = $cartitem->quantity;
            $orderdetail->shipfirstname = $request->session()->get('shipInfor')['sfname'];
            $orderdetail->shiplastname = $request->session()->get('shipInfor')['slname'];
            $orderdetail->shipemail = $request->session()->get('shipInfor')['semail'];
            $orderdetail->shipphone = $request->session()->get('shipInfor')['sphone'];
            $orderdetail->shipaddress= $request->session()->get('shipInfor')['sadd'];
            $orderdetail->save();
        }
        session()->forget('cart');
        return redirect()->route('profile.index');
    }
}

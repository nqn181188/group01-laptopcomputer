<?php

/**
 * PAYPAL API SERVICE TEST
 */

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\PayPalService as PayPalSvc;
use App\Models\Order;
use App\Models\OrderDetail;

use Illuminate\Http\Request;

class PayPalTestController extends Controller
{

    private $paypalSvc;

    public function __construct(PayPalSvc $paypalSvc)
    {
        // parent::__construct();

        $this->paypalSvc = $paypalSvc;
    }

    public function index(REQUEST $request)
    {
        foreach ($request->session()->get('cart') as $cartitem){
            $item['name']=$cartitem->name;
            $item['price']=$cartitem->price;
            $item['quantity']=$cartitem->quantity;
            $item['sku']=1;
            $data[]=$item;
        }
        $transactionDescription = "Payment for LaptopComputer's website";

        $paypalCheckoutUrl = $this->paypalSvc
                                  // ->setCurrency('eur')
                                  ->setReturnUrl(url('paypal/status'))
                                  // ->setCancelUrl(url('paypal/status'))
                                  ->setItem($data)
                                  // ->setItem($data[0])
                                  // ->setItem($data[1])
                                  ->createPayment($transactionDescription);

        if ($paypalCheckoutUrl) {
            return redirect($paypalCheckoutUrl);
        } else {
            dd(['Error']);
        }
    }

    public function status(REQUEST $request)
    {
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
            $orderdetail->shipemail = $request->session()->get('shipInfor')['slname'];
            $orderdetail->shipphone = $request->session()->get('shipInfor')['sphone'];
            $orderdetail->shipaddress= $request->session()->get('shipInfor')['sadd'];
            $orderdetail->save();
        }
        session()->forget('cart');
        return redirect()->route('profile.index');
    }

    public function paymentList()
    {
        $limit = 10;
        $offset = 0;

        $paymentList = $this->paypalSvc->getPaymentList($limit, $offset);

        dd($paymentList);
    }

    public function paymentDetail($paymentId)
    {
        $paymentDetails = $this->paypalSvc->getPaymentDetails($paymentId);

        dd($paymentDetails);
    }
}

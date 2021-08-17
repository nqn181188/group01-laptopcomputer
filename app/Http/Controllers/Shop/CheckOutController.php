<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\CartItem;
class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('shop.checkout');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
    public function doCheckout(Request $request) {
        
        $fname = $request->fname;
        $lname = $request->lname;
        $email = $request->email;
        $phone = $request->phone;
        $add = $request->add;
        $sfname = $request->sfname;
        $slname = $request->slname;
        $semail = $request->semail;
        $sphone = $request->sphone;
        $sadd = $request->sadd;
        $ordernumber=$request->ordernumber;
        $sta=$request->status;
       
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');

            if (isset($request->createAccount)) {
                $cust = new Customer();
                $cust->firstname = $fname;
                $cust->lastname = $lname;
                $cust->email = $email;
                $cust->password = \md5('123456');
                $cust->phone = $phone;
                $cust->address = $add;
                $cust->save();
            }
            // tạo và lưu order
            $ord = new Order();
            $ord->cust_id=$cust->id;
            if($ordernumber ==null){
                $str='0123456789';
                $ordernumber=str_shuffle($str);
                $ord->ordernumber=$ordernumber;
            }
           
            $ord->firstname = $fname;
            $ord->lastname = $lname;
            $ord->email = $email;
            $ord->phone = $phone;
            $ord->address = $add;
            if($sta==null){
                $sta=1;
                $ord->status=$sta;
            }
           
           
            $ord->order_date = \Carbon\Carbon::now();
            // lưu order
            $ord->save();

            // xử lý order detail
            foreach($cart as $item) {
                $detail = new OrderDetail();
                $detail->order_id = $ord->id;
                $detail->product_id = $item->id;
                $detail->quantity = $item->quantity;
                $detail->price = $item->price;
                $detail->shipfirstname = $item->sfname;
                $detail->shiplastname = $item->slname;
                $detail->shipemail= $item->semail;
                $detail->shipphone = $item->sphone;
                $detail->shipaddress = $item->sadd;
                $detail->save();
            }
        }

    

        // xóa session
        session()->forget('cart');
        return redirect()->route('home');
    }
}

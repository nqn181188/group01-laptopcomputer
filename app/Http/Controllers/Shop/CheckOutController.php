<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderDetail;
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
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            // tạo và lưu order
            $ord = new Order();
            $ord->firstname = $fname;
            $ord->lastname = $lname;
            $ord->email = $email;
            $ord->phone = $phone;
            $ord->address = $add;
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
                $detail->save();
            }
        }

        if (isset($request->createAccount)) {
            $cust = new Customer();
            $cust->firstname = $fname;
            $cust->lastname = $lname;
            $cust->username = $email;
            $cust->password = \md5('123456');
            $cust->email = $email;
            $cust->phone = $phone;
            $cust->address = $add;
            $cust->save();
        }

        // xóa session
        session()->forget('cart');
        return redirect()->route('home');
    }
}

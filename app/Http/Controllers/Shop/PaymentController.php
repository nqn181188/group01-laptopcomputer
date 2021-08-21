<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}

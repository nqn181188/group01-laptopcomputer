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
        return redirect()->route('save-order');
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

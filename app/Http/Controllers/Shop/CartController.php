<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Customer;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('shop.viewcart');
    }

    public function checkout()
    {
        //
        return view('shop.checkout');
    }

    public function orderHistoty($email){
        $orders = Order::find($email);
        return view('admin.order.index', compact('orders'));
    }

    public function showOrderHistory($ordernumber)
    {
        $billInfor = Order::where('ordernumber',$ordernumber)->first();
        $shipInfor = OrderDetail::where('ordernumber',$ordernumber)->distinct()->first();
            // dd($shipInfor);
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
    public function addCart(Request $request) {
        $id = $request->pid;
        $quantity = $request->quantity;
        $product = Product::find($id);
        // lấy cart từ session, nếu chưa có thì tạo mới
        // cart là 1 mảng các CartItem
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
        } else {
            $cart = [];
        }
        // xử lý thêm số lượng nếu item đã có trong cart
        // duyệt $cart để tìm xem có sản phẩm trong cart không?
        foreach($cart as $elem) {
            if ($elem->id === $id) {
                $item = $elem;
                break;
            }
        }
        // có sản phẩm -> tăng số lượng
        if (isset($item)) {
            $item->quantity += $quantity;
        } else {
            // chưa có sản phẩm, tạo mới
            // tạo đối tượng cart item
            $item = new CartItem($id, $product->name, $quantity, $product->price, $product->image);
            // thêm vào giỏ hàng
            $cart[] = $item;
        }
        // lưu vào session
        $request->session()->put('cart', $cart);
    }

    public function deleteCartItem(Request $request) {
        $id = $request->pid;
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            
            for($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]->id === $id) {
                    break;
                }
            }
            \array_splice($cart, $i, 1);   // xóa và reindex chỉ số
            // lưu vào session
            $request->session()->put('cart', $cart);
        }
    }
    public function changeCartQuantity(Request $request) {
        $id = $request->pid;
        $quantity = $request->quantity;
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            
            foreach($cart as $elem) {
                if ($elem->id === $id) {
                    $item = $elem;
                    break;
                }
            }

            if (isset($item)) {
                $item->quantity = $quantity;
            }
            // lưu vào session
            $request->session()->put('cart', $cart);
        }
    }
    public function clearSession(Request $request){
        
    
        session()->forget('cart');
        return redirect()->route('home');
    
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
       
        $sta=$request->status;
       
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');

            if (isset($request->createAccount)) {
                $cust = new Customer();
                $cust->firstname = $fname;
                $cust->lastname = $lname;
             
                $cust->password = \md5('123456');
                $cust->email = $email;
                $cust->phone = $phone;
                $cust->address = $add;
                $cust->save();
            }
            $ordernumber=substr(md5(microtime()),rand(0,26),10);
         
          
            // tạo và lưu order
            $ord = new Order();
            $ord->cust_id=$cust->id;
            $ord->ordernumber=$ordernumber;
            
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
                $detail->ordernumber = $ordernumber;
                $detail->product_id = $item->id;
                $detail->quantity = $item->quantity;
                $detail->price = $item->price;
                $detail->shipfirstname =$sfname;
                $detail->shiplastname = $slname;
                $detail->shipemail= $semail;
                $detail->shipphone =$sphone;
                $detail->shipaddress =$sadd;
                $detail->save();
            }
        }

    

        // xóa session
        session()->forget('cart');
        return redirect()->route('home');
    }
}

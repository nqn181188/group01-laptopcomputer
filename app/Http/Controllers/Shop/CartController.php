<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Customer;
use App\Models\WishList;

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
        $user = session()->get('user');
        if(!$user){
            return redirect()->route('login')->with(['need_login'=>'You need login to shoping']);
        }else{
            return view('shop.checkout');
        }
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

    public function viewWishlist(REQUEST $request){
        $user = session()->get('user');
        if(!$user){
            return redirect()->route('login')->with(['need_login_wishlist'=>'You need login to check wishlist']);
        }else{
            $cust_id = $user->id;
            $wishlists=WishList::where('cust_id',$cust_id)->get('product_id');
            $productWishList=array();
            $countWistList = 0;
            foreach($wishlists as $wishlist){
                $productWishList[]=$wishlist->product_id;
                
            }
            $items=array();
            if($productWishList!=null){
                $items = Product::whereIn('id',$productWishList)->get();
            }
            $countItems=session()->put('count-wishlist',count($items));
            return view('shop.profile.view-wishlist',compact(
                'items',
            ));
        }
    }

    public function addWishlist(Request $request) {
        $id = $request->pid;
        $cust_id = $request->session()->get('user')->id;
        $wishlists = WishList::where('cust_id',$cust_id)->get();
        $counts = WishList::where('cust_id',$cust_id)->count();
        if($counts>0){
            foreach($wishlists as $wishlist){
                $productWishList[]=$wishlist->product_id;
            }
            if (!in_array($id,$productWishList)){
                $w = new WishList;
                $w->cust_id=$cust_id;
                $w->product_id=$id;
                $w->save();
            }
        }else{
                $w = new WishList;
                $w->cust_id=$cust_id;
                $w->product_id=$id;
                $w->save();
        }
        
    }
    public function deleteWishlist(Request $request) {
        $id = $request->pid;
        $cust_id = $request->session()->get('user')->id;
        $wishlist = WishList::where('cust_id',$cust_id)->where('product_id',$id)->delete();
    }
    public function addCart(Request $request) {
        $id = $request->pid;
        $quantity = $request->quantity;
        $product = Product::find($id);
        // l???y cart t??? session, n???u ch??a c?? th?? t???o m???i
        // cart l?? 1 m???ng c??c CartItem
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
        } else {
            $cart = [];
        }
        // x??? l?? th??m s??? l?????ng n???u item ???? c?? trong cart
        // duy???t $cart ????? t??m xem c?? s???n ph???m trong cart kh??ng?
        foreach($cart as $elem) {
            if ($elem->id === $id) {
                $item = $elem;
                break;
            }
        }
        // c?? s???n ph???m -> t??ng s??? l?????ng
        if (isset($item)) {
            $item->quantity += $quantity;
        } else {
            // ch??a c?? s???n ph???m, t???o m???i
            // t???o ?????i t?????ng cart item
            $item = new CartItem($id, $product->name, $quantity, $product->price, $product->image);
            // th??m v??o gi??? h??ng
            $cart[] = $item;
        }
        $request->session()->put('cart', $cart);
    }

    public function deleteCartItem(Request $request) {
        $id = $request->pid;
        $name = Product::where('id',$id)->get(['name']);
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            
            for($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]->id === $id) {
                    break;
                }
            }
            array_splice($cart, $i, 1);   // x??a v?? reindex ch??? s???
            // l??u v??o session
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
            // l??u v??o session
            $request->session()->put('cart', $cart);
        }
    }
    public function clearSession(Request $request){
        
    
        session()->forget('cart');
        return redirect()->route('viewcart');
    }
    
}

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
            foreach($wishlists as $wishlist){
                $productWishList[]=$wishlist->product_id;
            }
            $items=array();
            if($productWishList!=null){
                $items = Product::whereIn('id',$productWishList)->get();
            }
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
            array_splice($cart, $i, 1);   // xóa và reindex chỉ số
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
        return redirect()->route('viewcart');
    }
    
}

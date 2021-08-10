<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\CartItem;
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

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Auth\Events\Failed;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use App\Models\OrderDetail;
class AdminController extends Controller
{
    public function index(){
        
        return redirect()->route('admin.dashboard');
    }
    public function dashboard(){
        $totalOrders = Order::all()->count();
        $numOrderOnCurrentMonth=Order::whereYear('created_at','=',date('Y'))->whereMonth('created_at','=',date('m'))->count();
        $warehouse = Product::all()->sum('quantity');
        $totalProductSold = OrderDetail::get()->sum('quantity');
        $newCusts = Customer::whereYear('created_at','=',date('Y'))->whereMonth('created_at','=',date('m'))->count();
        $totalCusts = Customer::all()->count();
        $users = Admin::all()->count();
        return view('admin.dashboard',compact(
            'totalOrders',
            'numOrderOnCurrentMonth',
            'totalProductSold',
            'warehouse',
            'newCusts',
            'totalCusts',
            'users',
        ));
    }
    public function login(){
        return view('admin.login');
    }

    public function checkEmailLogin(Request $request){
        $email = $request->email;
        $account = Admin::where('email',$email)->first();
        $result = false;
        if (isset($account)){
            $result = true;
        }
        return $result;
    }
    
    public function processLogin(REQUEST $request){
        // echo md5('1');
        $validator = Validator::make($request->all(),[
            'email'    => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Please enter your email',
            'password.required' => 'Please enter your password',
        ]);

        if( $validator->fails() ){
            return redirect()->back()->
            withErrors($validator)->withInput();
        }

        $email = $request->email;
        $pass = md5($request->password);
        $account = Admin::where('email',$email)->first();
        // Hash::check(request('password'), $account->password);
        if(!isset($account)){
            $request->session()->flash('msg', 'There is not this account !');
            return redirect()->route('admin.login');
        }else if($pass!==$account->password){
            $request->session()->flash('msgPass', 'Wrong password !');
            return redirect()->route('admin.login');
            // with()->withInput();
        }

        //         if( ! Hash::check( $account->password , Input::get('password') ) )
        // {
        //     return Redirect::to('/admin/profile')
        //         ->with('message', 'Current Password Error !')
        //         ->withInput();
        // }
        //lưu thông tin đăng nhập vào session
        $request->session()->put('user',$account);
        return redirect()->route('admin.dashboard')->withSuccessLogin('Login Success');
    }

    public function processLogout(){
        session()->forget('user');
        return redirect()->route('admin.login');
    }
    public function sellInfor(){
        $orderdetails = OrderDetail::get('product_id');
        $soldProductId = array();
        foreach($orderdetails as $orderdetail){
            $soldProductId[]=$orderdetail->product_id;
        }
        $products = Product::get(['id','name','image','quantity','price']);
        $sellinfors = array();
        foreach($products as $product){
            $sellinfor = array();
            $sellinfor['id']=$product->id;
            $sellinfor['image']=$product->image;
            $sellinfor['name']=$product->name;
            $sellinfor['price']=$product->price;
            $sellinfor['quantity']=$product->quantity;
            if(in_array($product->id,$soldProductId)){
                $sellinfor['sold']=OrderDetail::where('product_id',$product->id)->sum('quantity');
            }else{
                $sellinfor['sold']=0;
            }
            $sellinfors[]=$sellinfor;
        }
        usort($sellinfors, function($a, $b) {
            return $b['sold'] <=> $a['sold'];
        });
        return view('admin.product.sellinfor',compact(
            'sellinfors',
        ));
    }
}

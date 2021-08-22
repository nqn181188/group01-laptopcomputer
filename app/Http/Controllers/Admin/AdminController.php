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
        $totalProducts = Product::all()->count();
        $totalProductSold = OrderDetail::get()->sum('quantity');
        return view('admin.dashboard',compact(
            'totalOrders',
            'numOrderOnCurrentMonth',
            'totalProductSold',
            'totalProducts',
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
}

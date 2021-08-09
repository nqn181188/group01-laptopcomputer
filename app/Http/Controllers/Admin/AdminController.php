<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Auth\Events\Failed;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(){
        
        return redirect()->route('admin.dashboard');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function login(){
        return view('admin.login');
    }
    public function processLogin(REQUEST $request,Admin $account){
        // echo md5('1');
        $validator = Validator::make($request->all(),[
            'email'    => 'required',
            'password' => 'required',
            // 'password' => 'required|same:admins,password'.$account->id,
        ],[
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Bạn chưa nhập password',
            'password.same' => 'Nhập sai password',
        ]);

        if( $validator->fails() ){
            return redirect()->back()->
            withErrors($validator)->withInput();
        }

        $email = $request->email;
        $pass = md5($request->password);
        $account = Admin::where('email',$email)->first();
        if(!$account){
            return redirect()->route('admin.login');
        }
        if($pass!==$account->password){
            return redirect()->route('admin.login');
        }
        //lưu thông tin đăng nhập vào session
        $request->session()->put('user',$account);
        return redirect()->route('admin.dashboard');
    }

    public function processLogout(){
        session()->forget('user');
        return redirect()->route('admin.login');
    }
}

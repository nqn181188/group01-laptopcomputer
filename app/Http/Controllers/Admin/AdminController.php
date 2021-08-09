<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Auth\Events\Failed;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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
    public function processLogin(REQUEST $request){
        // echo md5('1');
        $validator = Validator::make($request->all(),[
            'email'    => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Bạn chưa nhập password',
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
            $request->session()->flash('msg', 'Không có account này !');
            return redirect()->route('admin.login');
        }else if($pass!==$account->password){
            $request->session()->flash('msgPass', 'Bạn nhập sai password !');
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
        return redirect()->route('admin.dashboard');
    }

    public function processLogout(){
        session()->forget('user');
        return redirect()->route('admin.login');
    }
}

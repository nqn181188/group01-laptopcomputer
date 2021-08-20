<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return redirect()->route('shop.login');
    }

    public function login()
    {
        return view('shop.login');
    }


    public function processLogin(Request $request){
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
        $account = Customer::where('email',$email)->first();
        if(!$account){
            return redirect()->route('login');
        }
        if($pass!==$account->password){
            $request->session()->flash('msgPass', 'Wrong password !');
            return redirect()->route('login');
        }
        //lưu thông tin đăng nhập vào session
        $request->session()->put('user',$account);
        return redirect()->route('home')->with(['success_login'=>'Welcome to Laptop Computer']);
    }

    public function processLogout(){
        session()->forget('user');
        return redirect()->route('home')->with(['success_logout'=>'Thank for using our service']);
    }

    public function checkEmail(Request $request){
        $email = $request->email;
        $customer = Customer::where('email',$email)->first();
        $result = false;
        if (isset($customer)){
            $result = true;
        }
        return $result;
    }

    public function register()
    {
        return view('shop.register');
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
        $validator = Validator::make($request->all(),[
            'firstname' => 'required|min:3',
            'lastname' => 'required|min:3',
            'email'    => 'email|unique:customers,email,',
            'password' => 'required|between:1,32',
            'confirm' => 'same:password',
        ]);

        if( $validator->fails() ){
            return redirect()->back()->
            withErrors($validator)->withInput();
        }

        $customer = $request->all();
        $customer['password'] = md5($customer['password']);
        Customer::create($customer);
        return redirect()->route('login')->with(['success_register'=>'Register Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('shop.my-account',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */

    public function editPass($id){
        $customer = Customer::find($id);
        return view('shop.update-pass-my-account',compact('customer'));
    }

    public function updatePass(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'current_password' => 'required',
            'password' => 'required|between:1,32',
            'confirm' => 'same:password',
        ]);

        if( $validator->fails() ){
            return redirect()->back()->
            withErrors($validator)->withInput();
        }
        $customer = Customer::find($id);
        $current_password = md5($request->current_password);
        $userPassword = $customer->password;
        if ($current_password!==$userPassword) {
            return back()->withErrors(['current_password'=>'password not match']);
        }
        $customer->password  = $request->password;
        $customer['password'] = md5($customer['password']);
        $customer->save();
        return redirect()->route('home');
    }

    // public function editProfile($id){
    //     $customer = Customer::find($id);
    //     return view('shop.update-my-account',compact('customer'));
    // }

    // public function updateProfile(Request $request,$id)
    // {
    //     $customer = Customer::find($id);
    //     $validator = Validator::make($request->all(),[
    //         'email'    => 'email|unique:customers,email,'.$customer->id,
    //         'phone' => 'required|regex:/(0)[0-9]{9}/',
    //     ]);

    //     if( $validator->fails() ){
    //         return redirect()->back()->
    //         withErrors($validator)->withInput();
    //     }
    //     $customer->email  = $request->email;
    //     $customer->phone  = $request->phone;
    //     $customer->address  = $request->address;
    //     $customer->save();
    //     return redirect()->route('home');
    // }

    public function edit(Customer $customer)
    {
        // return view('shop.update-my-account',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        // $validator = Validator::make($request->all(),[
        //     'email'    => 'email|unique:customers,email,'.$customer->id,
        //     'phone' => 'required|regex:/(0)[0-9]{9}/',
        // ]);

        // if( $validator->fails() ){
        //     return redirect()->back()->
        //     withErrors($validator)->withInput();
        // }
        // $customer->email  = $request->email;
        // $customer->phone  = $request->phone;
        // $customer->address  = $request->address;
        // $customer->save();
        // return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}

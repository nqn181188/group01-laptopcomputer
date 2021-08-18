<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function checkEmail(Request $request){
    //     $email = $request->email;
    //     $account = Customer::where('email',$email)->first();
    //     $result = false;
    //     if (isset($account)){
    //         $result = true;
    //     }
    //     return $result;
    // }

    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $customer = $request->all();
        $customer['password'] = md5($customer['password']);
        Customer::create($customer);
        return redirect()->route('admin.customer.index')->with(['success_create'=>'Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('admin.customer.update', compact('customer'));
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
        $rules = [
            
            'email'    => 'email|unique:customers,email,'.$customer->id,
            // 'password' => 'required|between:1,32',
            // 'confirm' => 'same:password',
            'address' => 'required',
            'phone' => 'required|regex:/(0)[0-9]{9}/',
        ];
        $this->validate($request, $rules,
            // [
            //     'firstname.required' => 'Bạn chưa nhập Tên',
            //     'lastname.required' => 'Bạn chưa nhập Họ',
            //     'password.required' => 'Bạn chưa nhập mật khẩu',
            //     'confirm.required_with' => 'Bạn chưa nhập xác nhận mật khẩu',
            //     'confirm.same' => 'Xác nhận mật khẩu không giống mật khẩu',
            //     'email.required' => 'Bạn chưa nhập email',
            //     'email.unique' => 'Email này đã tồn tại',
            //     'address.required' => 'Bạn chưa nhập địa chỉ',
            //     'phone.required' => 'Bạn chưa nhập số điện thoại',
            //     'phone.regex' => 'Bạn cần bắt đầu số điện thoại là số 0 và số đt phải đủ 10 chữ số',
            // ]
        );

        $customer->firstname  = $request->firstname;
        $customer->lastname  = $request->lastname;
        $customer->email  = $request->email;
        $customer->phone  = $request->phone;
        $customer->address  = $request->address;
        // $customer->password  = $request->password;
        $customer->lock  = $request->lock;
        // $customer['password'] = md5($customer['password']);
        $customer->save();
        return redirect()->route('admin.customer.index')->with(['success_update'=>'Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        // if ($customer->image != null) {
        //     if (file_exists('images/' . $customer->image)) {
        //         unlink('images/' . $customer->image);
        //     }
        // }
        $customer->delete();
        return redirect()->route('admin.customer.index')->withSuccessDelete('Deleted');
    }
}

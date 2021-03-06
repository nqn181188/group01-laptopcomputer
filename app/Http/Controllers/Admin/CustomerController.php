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
    public function index(Request $request)
    {
        $lock = $request->lock??0;
        $customers = Customer::where('id','!=','0');
        if($lock){
            $customers->where('lock',1);
        }
        $customers = $customers->paginate(11);
        return view('admin.customer.index', compact(
            'customers',
            'lock',
        ));
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
            // 'address' => 'required',
            'phone' => 'required|regex:/(0)[0-9]{9}/',
        ];
        $this->validate($request, $rules,
            // [
            //     'firstname.required' => 'B???n ch??a nh???p T??n',
            //     'lastname.required' => 'B???n ch??a nh???p Ho??',
            //     'password.required' => 'B???n ch??a nh???p m???t kh???u',
            //     'confirm.required_with' => 'B???n ch??a nh???p x??c nh???n m???t kh???u',
            //     'confirm.same' => 'X??c nh???n m???t kh???u kh??ng gi???ng m???t kh???u',
            //     'email.required' => 'B???n ch??a nh???p email',
            //     'email.unique' => 'Email n??y ???? t???n t???i',
            //     'address.required' => 'B???n ch??a nh???p ??i??a chi??',
            //     'phone.required' => 'B???n ch??a nh???p s???? ??i????n thoa??i',
            //     'phone.regex' => 'B???n c????n b????t ??????u s???? ??i????n thoa??i la?? s???? 0 va?? s???? ??t pha??i ??u?? 10 ch???? s????',
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
        // $customer->delete();
        return redirect()->route('admin.customer.index')->withSuccessDelete('Deleted');
    }
}

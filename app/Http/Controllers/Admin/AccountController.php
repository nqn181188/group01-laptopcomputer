<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Admin::all();
        return view('admin.account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function checkEmail(Request $request){
    //     $email = $request->email;
    //     $account = Admin::where('email',$email)->first();
    //     $result = false;
    //     if (isset($account)){
    //         $result = true;
    //     }
    //     return $result;
    // }

    public function create()
    {
        return view('admin.account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountRequest $request)
    {
        $account = $request->all();
        $account['password'] = md5($account['password']);
        // $account['password'] = Hash::make($request->password);
        
        Admin::create($account);
        return redirect()->route('admin.account.index')->with(['success_update'=>'Updated']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $account
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Admin $account)
    {
        return view('admin.account.update', compact('account'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $account)
    {
        $rules = [
            'firstname' => 'required|min:3',
            'lastname' => 'required|min:3',
            'email'    => 'email|unique:admins,email,'.$account->id,
            // 'password' => 'required|between:1,32',
            // 'confirm' => 'same:password',
            'address' => 'required',
            'role' => 'required',
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
            //     'role.required' => 'B???n ch??a cho??n vai tro??',
                
            // ]
        );

        $account->firstname  = $request->firstname;
        $account->lastname  = $request->lastname;
        $account->email  = $request->email;
        $account->address  = $request->address;
        // $account->password  = $request->password;
        $account->role  = $request->role;
        // $account['password'] = md5($account['password']);
        // $account['password'] = Hash::make($request->password);
        $account->save();
        return redirect()->route('admin.account.index')->with(['success_update'=>'Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $account)
    {
        // if ($account->image != null) {
        //     if (file_exists('images/' . $account->image)) {
        //         unlink('images/' . $account->image);
        //     }
        // }
        $delete = Admin::destroy($account->id);
        // if ($delete == 1) {
        //     $success = true;
        //     $message = "User deleted successfully";
        // } else {
        //     $success = true;
        //     $message = "User not found";
        // }

        // //  return response
        // return response()->json([
        //     'success' => $success,
        //     'message' => $message,
        // ]);

        return redirect()->route('admin.account.index')->withSuccessDelete('Deleted');
    }
}

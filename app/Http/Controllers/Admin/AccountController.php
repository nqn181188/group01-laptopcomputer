<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

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
        return view('admin.account.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request)
    {
        $account = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();            
            if ($extension != 'jpg' && $extension != 'jpeg' && $extension != 'png') {
                return redirect()->route('admin.account.create');
            }
            
            $imgName = $file->getClientOriginalName();
            $file->move('images', $imgName);
            $account['image'] = $imgName;
        }
        $account['password'] = md5($account['password']);
        Admin::create($account);
        return redirect()->route('admin.account.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
        return view('admin.account.update', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $account)
    {
        $rules = [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'username'=>'unique:accounts,username,'.$account->id,
            'email'    => 'email|unique:accounts,email,'.$account->id,
            'password' => 'required|between:3,32',
            'confirm' => 'same:password',
            'image' => 'mimes:jpg,jpeg,bmp,png|max:10000'
        ];
        $this->validate($request, $rules,
        [
            'first_name.required' => 'Bạn chưa nhập tài khoản',
            'username.required' => 'Bạn chưa nhập tài khoản',
            'username.required' => 'Bạn chưa nhập tài khoản',
            'username.unique' => 'Tài khoản này đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'confirm.required_with' => 'Bạn chưa nhập xác nhận mật khẩu',
            'confirm.same' => 'Xác nhận mật khẩu không giống mật khẩu',
            'email.required' => 'Bạn chưa nhập email',
            'email.unique' => 'Email này đã tồn tại',
            'image.image' => 'Bạn phải upload tập tin hình ảnh',
            'image.mimes' => 'Bạn chỉ có thể upload tập tin có đuôi jpg, jpeg, png',
            'image.max' => 'Kích thước tối đa của tập tin hình ảnh là 10Mb',
        ]);

        $account->username  = $request->username;
        $account->password  = $request->password;
        $account->email  = $request->email;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();            
            if ($extension != 'jpg' && $extension != 'jpeg' && $extension != 'png') {
                return redirect()->route('admin.account.update');
            }
            
            $imgName = $file->getClientOriginalName();
            $file->move('images', $imgName);
            $account['image'] = $imgName;
        }
        $account['password'] = md5($account['password']);
        $account->save();
        return redirect()->route('admin.account.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        if ($admin->image != null) {
            if (file_exists('images/' . $admin->image)) {
                unlink('images/' . $admin->image);
            }
        }
        $admin->delete();
        return redirect()->route('admin.account.index');
    }
}

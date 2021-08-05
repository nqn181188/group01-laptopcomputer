<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $customer=session('user')->id;
        
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'firstname' => 'required|min:3',
                    'lastname' => 'required|min:3',
                    'email' => 'required|email|unique:customers,email',
                    'password' => 'required|between:1,32',
                    'confirm' => 'required|same:password',
                    'address' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'firstname' => 'required|min:3',
                    'lastname' => 'required|min:3',
                    'email'    => 'email|unique:customers,email,'.$customer,
                    'password' => 'required|between:1,32',
                    'confirm' => 'same:password',
                    'address' => 'required',
                    'phone' => 'required|regex:/(0)[0-9]{9}/',
                ];
            }
            default:
                break;
        }
    }

    public function messages() {
        return [
            // 'username.required' => 'Bạn chưa nhập tài khoản',
            // 'username.unique' => 'Tài khoản này đã tồn tại',
            'firstname.required' => 'Bạn chưa nhập Tên',
            'lastname.required' => 'Bạn chưa nhập Họ',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'confirm.required_with' => 'Bạn chưa nhập xác nhận mật khẩu',
            'confirm.same' => 'Xác nhận mật khẩu không giống mật khẩu',
            'email.required' => 'Bạn chưa nhập email',
            'email.unique' => 'Email này đã tồn tại',
            'address.required' => 'Bạn chưa nhập địa chỉ',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.regex' => 'Bạn cần bắt đầu số điện thoại là số 0 và số đt phải đủ 10 chữ số',
        ];
    }
}

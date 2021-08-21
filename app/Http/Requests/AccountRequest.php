<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
        $user_id=session('user')->id;
        
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'firstname' => 'required|min:3',
                    'lastname' => 'required|min:3',
                    'email' => 'required|email|unique:admins,email',
                    'password' => 'required|between:1,32',
                    'confirm' => 'required|same:password',
                    'address' => 'required',
                    'role' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'firstname' => 'required|min:3',
                    'lastname' => 'required|min:3',
                    // 'username'=>'unique:admins,username,'.$user_id,
                    'email'    => 'email|unique:admins,email,'.$user_id,
                    'password' => 'required|between:1,32',
                    'confirm' => 'same:password',
                    'address' => 'required',
                    'role' => 'required',
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
            // 'firstname.required' => 'Bạn chưa nhập Tên',
            // 'lastname.required' => 'Bạn chưa nhập Họ',
            // 'password.required' => 'Bạn chưa nhập mật khẩu',
            // 'confirm.required_with' => 'Bạn chưa nhập xác nhận mật khẩu',
            // 'confirm.same' => 'Xác nhận mật khẩu không giống mật khẩu',
            // 'email.required' => 'Bạn chưa nhập email',
            // 'email.unique' => 'Email này đã tồn tại',
            // 'address.required' => 'Bạn chưa nhập địa chỉ',
            // 'role.required' => 'Bạn chưa chọn vai trò',
        ];
    }
}

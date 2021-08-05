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
                    'first_name' => 'required|min:3',
                    'last_name' => 'required|min:3',
                    'username' => 'required|unique:accounts,username|min:3',
                    'email' => 'required|email|unique:accounts,email',
                    'password' => 'required|between:1,32',
                    'confirm' => 'required|same:password',
                    'image' => 'mimes:jpg,jpeg,bmp,png|max:10000'
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    
                    'username'=>'unique:accounts,username,'.$user_id,
                    'email'    => 'email|unique:accounts,email,'.$user_id,
                    'password' => 'required|between:3,32',
                    'confirm' => 'same:password',
                    'image' => 'mimes:jpg,jpeg,bmp,png|max:10000'
                ];
            }
            default:
                break;
        }
    }

    public function messages() {
        return [
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
        ];
    }
}

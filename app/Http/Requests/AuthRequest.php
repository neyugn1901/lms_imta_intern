<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Đặt thành true để cho phép tất cả người dùng gửi request
    }

    // Xác định các quy tắc xác thực cho request này
    public function rules()
    {
        return [
            'email' => 'required|email', // Yêu cầu phải có email hợp lệ
            'password' => 'required|min:6', // Mật khẩu phải có ít nhất 6 ký tự
        ];
    }

    // Thông báo lỗi tuỳ chỉnh (không bắt buộc)
    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ];
    }
}

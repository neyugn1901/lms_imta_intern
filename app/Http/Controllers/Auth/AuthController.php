<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    public function index()
    {
        // Kiểm tra nếu người dùng đã đăng nhập
        if (Auth::guard('web')->check() || Auth::guard('student')->check()) {
            return $this->redirectUser();
        }
        return view('auth.login');
    }

    public function viewRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students', // Tạo tài khoản cho sinh viên
            'password' => 'required|min:8|confirmed',
        ]);

        // Tạo tài khoản sinh viên mới
        $student = new Student();
        $student->username = $request->username;
        $student->email = $request->email;
        $student->password = bcrypt($request->password);
        $student->save();

        // Chuyển hướng hoặc trả về phản hồi như mong muốn
        return redirect()->route('auth.login')->with('success', 'Tạo tài khoản thành công');
    }

    public function login(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            // Đăng nhập thành công với guard 'web'
            return redirect()->route('dashboard.index');
        } elseif (Auth::guard('student')->attempt($credentials)) {
            // Đăng nhập thành công với guard 'student'
            return redirect()->route('home.index');
        }

        // Đăng nhập thất bại
        return redirect()->route('auth.login')->with('error', 'Email hoặc mật khẩu không chính xác.');
    }

    public function logout(Request $request)
    {
        // Logout cả hai guards
        Auth::guard('web')->logout();
        Auth::guard('student')->logout();

        // Đảm bảo session được xóa và token được làm mới
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Chuyển hướng về trang đăng nhập
        return redirect()->route('auth.login');
    }

    protected function redirectUser()
    {
        // Kiểm tra và chuyển hướng người dùng dựa trên loại tài khoản
        if (Auth::guard('web')->check()) {
            return redirect()->route('dashboard.index');
        } elseif (Auth::guard('student')->check()) {
            return redirect()->route('home.index');
        }

        return redirect()->route('auth.login');
    }
}

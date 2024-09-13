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
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'password' => 'required|min:8|confirmed',
        ]);

        
        $student = new Student();
        $student->username = $request->username;
        $student->email = $request->email;
        $student->password = bcrypt($request->password);
        $student->save();

        
        return redirect()->route('auth.login')->with('success', 'Tạo tài khoản thành công');
    }

    public function login(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            
            return redirect()->route('dashboard.index');
        } elseif (Auth::guard('student')->attempt($credentials)) {
            
            return redirect()->route('home.index');
        }

        
        return redirect()->route('auth.login')->with('error', 'Email hoặc mật khẩu không chính xác.');
    }

    public function logout(Request $request)
    {
       
        Auth::guard('web')->logout();
        Auth::guard('student')->logout();

        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        
        return redirect()->route('auth.login');
    }

    protected function redirectUser()
    {
        
        if (Auth::guard('web')->check()) {
            return redirect()->route('dashboard.index');
        } elseif (Auth::guard('student')->check()) {
            return redirect()->route('home.index');
        }

        return redirect()->route('auth.login');
    }
}

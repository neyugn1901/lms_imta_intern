<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;



class AuthController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect()->route('dashboard.index');
        }
        return view('auth.login');
    }

    public function viewRegister(){
        return view('auth.register');
    }
    
   
    
    public function register(Request $request){
        $password = $request->password;
        $confirm_password = $request->confirm_password;
        $email = $request->email;
        $fullname = $request->fullname;

        if ($password != $confirm_password){
            return view('auth.register', [
                'message' => 'hai password khong trung nhau, nhap lai'
            ]);
        }

        $data = [
            'fullname' =>$fullname,
            'email' => $email,
            'password' => bcrypt($password)
        ];

        $user = User::create($data);

        return view('auth.register', [
            'message' => 'tao tai khoan thanh cong'
        ]);
    }

    public function login(AuthRequest $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)){
            return redirect()->route('dashboard.index')->with('success', 'Đăng nhập thành công');
        }

        return redirect()->route('auth.login')->with('error', 'Email hoặc mật khẩu không chính xác');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 
        return redirect()->route('auth.admin');
    }
}


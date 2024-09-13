<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('student')->check()) {
            return redirect()->route('auth.login')->with('error', 'Vui lòng đăng nhập để truy cập trang này.');
        }

        return $next($request);
    }
}
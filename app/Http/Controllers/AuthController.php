<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login_form()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            "email"=> "required",
            "password"=> "required",
        ], [
            "email.required"=> "اسم المستخدم مطلوب",
            "password.required"=> "كلمة المرور مطلوبة",
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if (!$user){
            return redirect()->back()->with("login_error","لايوجد مستخدم بهذا الاسم");
        }
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with("login_error","خطأ في  كلمة المرور");
        }

        Auth::login($user);
        return redirect()->route('main');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login_form');
    }
}

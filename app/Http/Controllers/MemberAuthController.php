<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberAuthController extends Controller
{
    public function showLoginForm()
    {
        return view ('member.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');

        if (Auth::guard('member')->attempt($credentials)) {
            $member = Auth::guard('member')->user();

            if ($member->status != 'active') {
                Auth::guard('member')->logout();
                return back()->withErrors([
                    'login' => 'Sizga ruxsat yo\'q.',
                ])->withInput($request->except('password'));
            }

            return redirect()->intended(route('member.index'));
        }

        return back()->withErrors([
            'login' => 'Login yoki parol noto\'g\'ri.',
        ])->withInput($request->except('password'));
    }

    public function logout()
    {
        Auth::guard('member')->logout();
        return redirect()->route('member.login');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MercurySeries\Flashy\Flashy;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    public function create()
    {
        return view('frontend.sessions.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials, $request->has('remember'))) {
            if (Auth::user()->activated) {
                Flashy::success('Welcome back!');
                return redirect()->intended(route('frontend.users.profile', [Auth::user()]));
            } else {
                Auth::logout();
                Flashy::warning('你的账号未激活，请检查邮箱中的注册邮件进行激活。');
                return redirect('signin');
            }
        } else {
            Flashy::danger('E-Mail或密码错误，登录失败！');
            return redirect()->back();
        }
    }

    public function destroy()
    {
        Auth::logout();
        Flashy::warning('登出成功！欢迎下次再来呦~~');
        return redirect('/');
    }
}

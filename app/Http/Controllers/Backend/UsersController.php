<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function edit()
    {
        $user = User::find(Auth::id());
        return view('backend.content.users.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
//            'email' => 'required|email|unique:users|max:255',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->description = $request->description;
        $user->save();

        session()->flash('success', '用户信息更新成功！');
        return redirect('/backyard/index');
    }
}

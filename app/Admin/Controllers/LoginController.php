<?php
/**
 * Created by PhpStorm.
 * User: 阳毅
 * Date: 2018/9/4
 * Time: 14:41
 */

namespace App\Admin\Controllers;

use Illuminate\Http\Request;

class LoginController extends  Controller
{
    public function index()
    {
        return view('admin.login.index');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'password' => 'required|min:6|max:30',
        ]);

        $user = request(['name', 'password']);
        if (true == \Auth::guard('admin')->attempt($user)) {
            return redirect('/admin/index');
        }

        return \Redirect::back()->withErrors("用户名密码错误");
    }

    public function logout()
    {
        \Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
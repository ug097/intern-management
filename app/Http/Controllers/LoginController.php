<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller {

    //

    public function index(Request $request) {
        return view('login');
    }

    public function login(Request $request) {
        $login_id = $request->get('login_id');
        //暗号化
        $password = $request->get('password');

        $login_user = \App\SsStaff::where('mail', $login_id)->first();

        if ($login_user == null) {
            $message = 'ログインIDに誤りがあります';
            $request->session()->flash('msg', $message);
            return redirect('login')->withInput();
        } else {
            $check_pass = decrypt($login_user->password);

            if ($password != $check_pass) {
                $message = 'パスワードに誤りがあります';
                $request->session()->flash('msg', $message);
                return redirect('login')->withInput();
            } else {
                $request->session()->flush();
                $request->session()->put('login_staff', $login_user);
                return redirect('/');
            }
        }
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return redirect('/');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index(Request $request) {

        $ss_staffs = \App\SsStaff::All();

        // Blade への引数
        $bladeArgs = array(
           'ss_staffs'
        );

        return view('admin', compact($bladeArgs));
    }

    public function adminRegistForm(Request $request, String $id = null) {

        $ss_staff = ($id) ? \App\SsStaff::find($id) : null;

        // Blade への引数
        $bladeArgs = array(
            'ss_staff'
        );

        return view('admin_regist_form', compact($bladeArgs));
    }

    // ユーザー登録・更新
    public function adminRegist(Request $request) {

        // バリデーションチェック
        $this->check_form($request);

        // 登録or更新
        $ss_staff_id = $request->get('ss_staff_id');
        if($ss_staff_id){
            $ss_staff = \App\SsStaff::find($ss_staff_id);
        }else{
            $ss_staff = new \App\SsStaff();
        }

        // フォーム内容からテーブルへアップサート
        try{
            $ss_staff->name = $request->get('name');
            $ss_staff->mail = $request->get('mail');
            $ss_staff->password = encrypt($request->get('password'));
            $ss_staff->role = $request->get('role');

            $ss_staff->save();
            $message = 'ユーザーを登録しました。';

        } catch(\Exception $ex){
            Log::error('ユーザー登録エラー', [$ex->getMessage()]);
            $message = 'ユーザーの登録に失敗しました。';
        }
        $request->session()->flash('msg', $message);

        return redirect("admin/regist_form/$ss_staff->id")->withInput();
    }

    // ユーザー削除
    public function adminDelete(Request $request) {

        try{
            \App\SsStaff::find($request->get('id'))->delete();
            $message = '削除しました。';

        } catch(\Exception $ex){
            Log::error('登録時エラー', [$ex->getMessage()]);
            $message = '削除に失敗しました。';
        }
        return $message;
    }
    // バリデーションチェック
    public function check_form($req) {

        // ルール
        $validate_rule = [
            'name' => 'required',
            'mail' => 'required | email',
            'password' => 'required | regex:/^[a-zA-Z0-9]+$/ | min:8',
            'role' => 'required',
        ];

        // エラーメッセージ
        $message = [
            'name.required' => '必須項目です。',
            'mail.required' => '必須項目です。',
            'mail.email' => 'メールアドレスの形式が不正です。',
            'password.required' => '必須項目です。',
            'password.regex' => '半角英数字のみ入力して下さい。',
            'password.min' => '8字以上入力して下さい。',
            'role.required' => '必須項目です。',
        ];

        $this->validate($req, $validate_rule, $message);
    }

}

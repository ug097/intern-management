<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InternOfferController extends Controller
{
    // 求人一覧画面
    public function index(Request $request) {

        // 求人一覧情報
        $offers = \App\InternOffer::with('company', 'ss_staff')->get();
        
        // セレクトボックス用マスタデータ
        $ss_staffs = \App\SsStaff::All();
        
        // Blade への引数
        $bladeArgs = array(
            'offers',
            'ss_staffs'
        );
        return view('offer_list', compact($bladeArgs));
    }
    
    // 求人ステータス登録
    public function offerStatusEdit(Request $request) {
        
        // ステータス更新対象の求人ID、更新するカラムと値を取得
        $offer_id = $request->get('offerId');
        $column = $request->get('column');
        $value = $request->get('value');

        // 学生のステータスを更新
        try{
            \App\InternOffer::find($offer_id)->update([$column => $value]);
            $message = '情報を更新しました。';
            
        } catch(\Exception $ex){
            Log::error('登録時エラー', [$ex->getMessage()]);
            $message = '情報の更新に失敗しました。';
        }
        return $message;
    }
    
    // 求人詳細画面
    public function detailOfferData(Request $request, String $id) {
        // Blade への引数
        $offer = \App\InternOffer::with('company')->find($id); 

        $bladeArgs = array(
            'offer'
        );

        return view('offer_detail', compact($bladeArgs));
    }

    // 求人登録フォーム画面
    public function offerRegistForm(Request $request) {

        // セレクトボックス用マスタデータ
        $companies = \App\Company::All(); 

        // Blade への引数
        $bladeArgs = array(
            'companies'
        );
        return view('offer_regist_form', compact($bladeArgs));
    }
    
    // 求人情報登録
    public function offerRegist(Request $request) {

        // バリデーションチェック
        $this->check_form($request);

        // フォームからテーブルに新規レコードを追加
        \DB::beginTransaction();
        try{
            // 初めて求人登録する企業の場合は、企業マスタに企業情報を登録し、企業IDを取得
            if(empty($request->get('company_id'))){
                $company_id = \App\Company::insertGetId([
                    'name' => $request->get('name'),
                    'address' => $request->get('address'),
                    'capital' => $request->get('capital'),
                    'established_year' => $request->get('established_year'),
                    'employee_number' => $request->get('employee_number'),
                    'ceo_name' => $request->get('ceo_name'),
                ]);
            }else{ 
                $company_id = $request->get('company_id');
            }

            // インターン求人テーブルに新規登録求人のレコードを挿入
            $offer = new \App\InternOffer();
            $offer->company_id = $company_id;
            $offer->pic_name = $request->get('pic_name');
            $offer->pic_mail = $request->get('pic_mail');
            $offer->pic_tel = $request->get('pic_tel');
            $offer->pic_dept = $request->get('pic_dept');
            $offer->pic_position = $request->get('pic_position');
            $offer->title = $request->get('title');
            $offer->desciption = $request->get('desciption');
            $offer->required_human_resource = $request->get('required_human_resource');
            $offer->required_human_skill = $request->get('required_human_skill');
            $offer->acquirable_ability = $request->get('acquirable_ability');
            $offer->required_work_hours = $request->get('required_work_hours');
            $offer->salary = $request->get('salary');
            $offer->appeal_point = $request->get('appeal_point');
            $offer->save();
            
            \DB::commit();
            $message = '求人情報を登録しました。';

        } catch(\Exception $ex){    
            \DB::rollBack();
            Log::error('求人情報登録エラー', [$ex->getMessage()]);
            $message = '情報の登録に失敗しました。';
        }
        $request->session()->flash('msg', $message);

        return redirect('offer/regist_form')->withInput();
    }

    // バリデーションチェック
    public function check_form($req) {

        // ルール
        $validate_rule = [
            'pic_name' => 'required',
            'pic_mail' => 'required | email',
            'pic_tel' => 'required| numeric',
            'pic_dept' => 'required',
            'title' => 'required',
            'desciption' => 'required',
            'required_human_resource' => 'required',
            'required_human_skill' => 'required',
            'acquirable_ability' => 'required',
        ];

        // 新規企業の登録時のみ、企業情報欄に制約をかける
        if(empty($req->get('company_id'))){
            $validate_rule = array_merge($validate_rule, array(
                'name' => 'required',
                'address' => 'required',
                'capital' => 'required',
                'established_year' => 'required| numeric',
                'employee_number' => 'required| numeric',
                'ceo_name' => 'required',
            ));
        }

        // エラーメッセージ
        $message = [
            'pic_name.required' => '必須項目です。',
            'pic_mail.required' => '必須項目です。',
            'pic_mail.email' => 'メールアドレスの形式が不正です。',
            'pic_tel.required' => '必須項目です。',
            'pic_tel.numeric' => '半角数字のみ入力して下さい。',
            'pic_dept.required' => '必須項目です。',
            'title.required' => '必須項目です。',
            'desciption.required' => '必須項目です。',
            'required_human_resource.required' => '必須項目です。',
            'required_human_skill.required' => '必須項目です。',
            'acquirable_ability.required' => '必須項目です。',

            'name.required' => '必須項目です。',
            'address.required' => '必須項目です。',
            'capital.required' => '必須項目です。',
            'established_year.required' => '必須項目です。',
            'established_year.numeric' => '半角数字のみ入力して下さい。',
            'employee_number.required' => '必須項目です。',
            'employee_number.numeric' => '半角数字のみ入力して下さい。',
            'ceo_name.required' => '必須項目です。',
        ];

        $this->validate($req, $validate_rule, $message);
    }
}

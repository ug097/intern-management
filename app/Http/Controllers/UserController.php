<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Common;
use Illuminate\Support\Facades\DB;
use setasign\Fpdi\Tcpdf\Fpdi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

use Storage;
use Slack;

class UserController extends Controller {

    public function index(Request $request) {

        // 学生検索フォームパラメータ
        $user_id = $request->get('id');
        $family_name = $request->get('family_name');
        $first_name = $request->get('first_name');
        $occupation_lg_id = $request->get('occupation_lg');
        $university_id = $request->get('university');
        $grad_school_id = $request->get('grad_school');
        $ss_staff_id = $request->get('ss_staff');

        // 学生一覧情報
        $query = \App\Users::with('user_status', 'ss_staff');

        // 検索条件で絞り込み
        if ($user_id) $query->find($user_id); // 学生ID
        if ($family_name) $query->where('family_name', 'LIKE', "%$family_name%"); // 姓
        if ($first_name) $query->where('first_name', 'LIKE', "%$first_name%"); // 名
        if ($occupation_lg_id) $query->where('occupation_lg_id', $occupation_lg_id); // 希望職種
        if ($university_id) $query->where('university_id', $university_id); // 大学名
        if ($grad_school_id) $query->where('grad_school_id', $grad_school_id); // 大学院名
        if ($ss_staff_id){ // SS担当者
            $query->whereHas('ss_staff', function($q) use($ss_staff_id){
                $q->where('ss_staff_id', $ss_staff_id);
            });
        }
        $users = $query->paginate(10);

        // セレクトボックス用マスタデータ
        $occupation_lgs = \App\OccupationLgs::All();
        $universities = \App\University::All();
        $grad_schools = \App\GradSchool::All();
        $ss_staffs = \App\SsStaff::All();
        $progresses = \App\MatchingProgress::All();
        $companies = \App\Company::All();

        // Blade への引数
        $bladeArgs = array(
           'users',
           'occupation_lgs',
           'universities',
           'grad_schools',
           'ss_staffs',
           'progresses',
           'companies'
        );

        return view('user_list', compact($bladeArgs));
    }

    // 学生登録フォーム画面
    public function userRegistForm(Request $request) {

        // セレクトボックス用マスタデータ
        $occupation_lgs = \App\OccupationLgs::All();
        $universities = \App\University::All();
        $grad_schools = \App\GradSchool::All();
        $undergraduates = \App\Undergraduate::All();
        $companies = \App\Company::All();

        // Blade への引数
        $bladeArgs = array(
            'occupation_lgs',
            'universities',
            'grad_schools',
            'undergraduates',
            'companies'
        );

        return view('user_regist_form', compact($bladeArgs));
    }

    // 学生情報登録
    public function userRegist(Request $request) {

        // バリデーションチェック
        $this->check_form($request);

        // フォームからテーブルに新規レコードを追加
        \DB::beginTransaction();
        try{
            // 学生情報テーブルへ新規学生登録し、そのIDを取得
            $user_id = \App\Users::insertGetId([
                'family_name' => $request->get('family_name'),
                'first_name' => $request->get('first_name'),
                'family_name_kana' => $request->get('family_name_kana'),
                'first_name_kana' => $request->get('first_name_kana'),
                'gender' => $request->get('gender'),
                'birthday' => $request->get('birthday'),
                'zip' => $request->get('zip'),
                'address' => $request->get('address'),
                'mail' => $request->get('mail'),
                'tel' => $request->get('tel'),
                'university_id' => $request->get('university_id'),
                'university_name' => $request->get('university_name'),
                'undergraduate_id' => $request->get('undergraduate_id'),
                'undergraduate_name' => $request->get('undergraduate_name'),
                'admission_year' => $request->get('admission_year'),
                'graduation_year' => $request->get('graduation_year'),
                'grad_school_id' => $request->get('grad_school_id'),
                'grad_school_name' => $request->get('grad_school_name'),
                'grad_admission_year' => $request->get('grad_admission_year'),
                'grad_graduation_year' => $request->get('grad_graduation_year'),
                'seminar_etc' => $request->get('seminar_etc'),
                'research_content' => $request->get('research_content'),
                'occupation_lg_id' => $request->get('occupation_lg_id'),
                'skill' => $request->get('skill'),
                'club_etc' => $request->get('club_etc'),
                'opportunity_to_know' => implode('、', $request->get('opportunity_to_know')), // 、区切りの文字列で登録
                'improve_ability' => $request->get('improve_ability'),
                'participation_experience' => $request->get('participation_experience'),
                'experienced_company' => $request->get('experienced_company'),
                'self_score' => $request->get('self_score'),
                'score_reason' => $request->get('score_reason'),
                'necessary' => $request->get('necessary'),
                'created_at' => Carbon::now('Asia/Tokyo')->format("Y-m-d H:i:s"),
                'updated_at' => Carbon::now('Asia/Tokyo')->format("Y-m-d H:i:s"),
            ]);

            // 進捗状況テーブルに新規登録学生分のレコードを挿入、学生IDのみ登録
            $user_status = new \App\UserStatus();
            $user_status->user_id = $user_id;
            $user_status->save();

            \DB::commit();

            // Slackで学生の新規登録を通知
            // Slack::send("ID $user_id が新規に申し込みしました。面談を実施して下さい。");

            return view('user_regist_thanks');

        } catch(\Exception $ex){
            \DB::rollBack();
            Log::error('学生情報登録エラー', [$ex->getMessage()]);
            $message = '情報の登録に失敗しました。';
            $request->session()->flash('msg', $message);
            return redirect('user/regist_form')->withInput();
        }
    }

    // 学生詳細画面
    public function detailUserData(Request $request, String $id) {
        // Blade への引数
        $user = \App\Users::with(['university', 'undergraduate', 'grad_school', 'occupation_lg', 'interview_content'])->find($id);

        $bladeArgs = array(
            'user'
        );

        return view('user_detail', compact($bladeArgs));
    }

    // 学生進捗情報登録
    public function userStatusEdit(Request $request) {

        // ステータス更新対象の学生ID、更新するカラムと値を取得
        $user_id = $request->get('userId');
        $column = $request->get('column');
        $value = $request->get('value');

        // 学生のステータスを更新
        try{
            \App\UserStatus::where('user_id', $user_id)
            ->update([$column => $value]);
            $message = '情報を更新しました。';

        } catch(\Exception $ex){
            Log::error('登録時エラー', [$ex->getMessage()]);
            $message = '情報の更新に失敗しました。';
        }
        return $message;
    }

    // 面談情報登録
    public function interviewRegist(Request $request) {

        // フォームからテーブルに新規レコードを追加
        try{
            \App\InterviewContent::updateOrCreate(
                ['user_id' => $request->get('user_id')],
                [
                    'user_id' => $request->get('user_id'),
                    'current_self' => $request->get('current_self'),
                    'five_years_later' => $request->get('five_years_later'),
                    'improvement' => $request->get('improvement'),
                    'after_intern' => $request->get('after_intern'),
                    'intern_aspiration' => $request->get('intern_aspiration'),
                    'strengths_affect' => $request->get('strengths_affect'),
                    'intern_condition' => $request->get('intern_condition'),
                    'free_description1' => $request->get('free_description1'),
                    'free_description2' => $request->get('free_description2'),
                    'free_description3' => $request->get('free_description3'),
                    'appeal_point' => $request->get('appeal_point')
                ]
            );
            $message = '面談情報を登録しました。';

        } catch(\Exception $ex){
            Log::error('登録時エラー', [$ex->getMessage()]);
            $message = '面談情報の登録に失敗しました。';
        }
        return $message;
    }

    // バリデーションチェック
    public function check_form($req) {

        // ルール
        $validate_rule = [
            'family_name' => 'required',
            'first_name' => 'required',
            'family_name_kana' => 'required | regex:/^[ァ-ヾ　〜ー]+$/u',
            'first_name_kana' => 'required | regex:/^[ァ-ヾ　〜ー]+$/u',
            'gender' => 'required',
            'birthday' => 'required | date_format:"Y/m/d"',
            'zip' => 'required | numeric',
            'address' => 'required',
            'mail' => 'required | email | unique:users,mail',
            'tel' => 'required| numeric',
            'university_id' => 'required',
            'undergraduate_id' => 'required',
            'admission_year' => 'required',
            'graduation_year' => 'required',
            'occupation_lg_id' => 'required',
            'opportunity_to_know' => 'required',
            'improve_ability' => 'required | max:110',
            'participation_experience' => 'required',
            'self_score' => 'required | numeric',
            'score_reason' => 'required | max:150',
            'necessary' => 'required | max:150',
        ];

        // インターン参加経験有の場合のみ、参加企業名欄にバリデーションを追加する
        if($req->get('participation_experience') == "1"){
            $validate_rule['experienced_company'] = 'required | max:110';
        }

        // エラーメッセージ
        $message = [
            'family_name.required' => '必須項目です。',
            'first_name.required' => '必須項目です。',
            'family_name_kana.required' => '必須項目です。',
            'first_name_kana.required' => '必須項目です。',
            'family_name_kana.regex' => '全角カタカナを入力してください。',
            'first_name_kana.regex' => '全角カタカナを入力してください。',
            'gender.required' => '必須項目です。',
            'birthday.required' => '必須項目です。',
            'birthday.date_format' => '入力した値が不正です。',
            'zip.required' => '必須項目です。',
            'zip.numeric' => '半角数字のみ入力して下さい。',
            'address.required' => '必須項目です。',
            'mail.required' => '必須項目です。',
            'mail.email' => 'メールアドレスの形式が不正です。',
            'mail.unique' => 'このメールアドレスはご利用頂けません。',
            'tel.required' => '必須項目です。',
            'tel.numeric' => '半角数字のみ入力して下さい。',
            'university_id.required' => '必須項目です。',
            'undergraduate_id.required' => '必須項目です。',
            'admission_year.required' => '必須項目です。',
            'graduation_year.required' => '必須項目です。',
            'occupation_lg_id.required' => '必須項目です。',
            'opportunity_to_know.required' => '必須項目です。',
            'improve_ability.required' => '必須項目です。',
            'improve_ability.regex' => '改行は使用できません。',
            'improve_ability.max' => '110字以内で入力してください。',
            'participation_experience.required' => '必須項目です。',
            'experienced_company.required' => '必須項目です。',
            'experienced_company.regex' => '改行は使用できません。',
            'experienced_company.max' => '110字以内で入力してください。',
            'self_score.required' => '必須項目です。',
            'self_score.numeric' => '半角数字のみ入力して下さい。',
            'score_reason.required' => '必須項目です。',
            'score_reason.regex' => '改行は使用できません。',
            'score_reason.max' => '150字以内で入力してください。',
            'necessary.required' => '必須項目です。',
            'necessary.regex' => '改行は使用できません。',
            'necessary.max' => '150字以内で入力してください。',
        ];

        $this->validate($req, $validate_rule, $message);
    }
}

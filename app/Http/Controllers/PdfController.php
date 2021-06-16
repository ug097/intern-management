<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use setasign\Fpdi\Tcpdf\Fpdi;
use Storage;

class PdfController extends Controller
{
 
    private $pdf;

    // 学生情報PDF出力
    public function userPdf(Request $request, String $id)
    {
        // 学生情報データ
        $user = \App\Users::with(['university', 'undergraduate', 'grad_school', 'occupation_lg', 'interview_content'])->find($id); 

        $this->pdf = new Fpdi('P', 'mm');
        $this->pdf->setSourceFile(public_path('/pdf/rirekisyo_interview.pdf')); // テンプレートPDFの設定
        $this->pdf->setPrintHeader(false); // pdf上部の罫線を非表示に

        // pdf１ページ目（履歴書情報）
        $this->pdf->AddPage();
        $tpl = $this->pdf->importPage(1); // テンプレートPDFの1ページ目
        $this->pdf->useTemplate($tpl);
        $this->pdf->SetFont('kozgopromedium', '', 8);
        $this->pdf->SetFontSize(10);

        // 値出力位置指定
        // ID
        $this->pdf->SetXY(45, 32);
        $this->pdf->MultiCell(20, 5, $user->id, 0, 'C', 0); // (セル幅, セル高, 表示テキスト, セル枠線無, 中央寄せ, 背景透明)

        // 性別
        $gender = ($user->gender == '0') ? '男性' : '女性'; 
        $this->pdf->SetXY(95, 32);
        $this->pdf->MultiCell(20, 5, $gender, 0, 'C', 0);

        // 生年月日
        $birthday = date('Y年m月d日', strtotime($user->birthday));
        $this->pdf->SetXY(145, 32);
        $this->pdf->MultiCell(45, 5, $birthday, 0, 'C', 0);

        // 大学名
        $univ_name = ($user->university_id == 999) ? $user->university_name : $user->university->name; 
        $this->pdf->SetXY(55, 46);
        $this->pdf->MultiCell(139, 5, $univ_name, 0, 'L', 0);

        // 学部名
        $under_name = ($user->undergraduate_id == 99) ? $user->undergraduate_name : $user->undergraduate->name; 
        $this->pdf->SetXY(55, 53);
        $this->pdf->MultiCell(139, 5, $under_name, 0, 'L', 0);

        // 大学入学年
        $this->pdf->SetXY(55, 60);
        $this->pdf->MultiCell(139, 5, $user->admission_year . ' 年', 0, 'L', 0);

        // 大学卒業年
        $this->pdf->SetXY(55, 67);
        $this->pdf->MultiCell(139, 5, $user->graduation_year . ' 年', 0, 'L', 0);

        // 大学院名
        if($user->grad_school_id){
            $grad_name = ($user->grad_school_id == 99) ? $user->grad_school_name : $user->grad_school->name; 
            $this->pdf->SetXY(55, 74);
            $this->pdf->MultiCell(139, 5, $grad_name, 0, 'L', 0);
        }
        // 研究室
        $this->pdf->SetXY(55, 81);
        $this->pdf->MultiCell(139, 5, $user->seminar_etc, 0, 'L', 0);

        // 大学院入学年
        if($user->grad_admission_year){
            $this->pdf->SetXY(55, 88);
            $this->pdf->MultiCell(139, 5, $user->grad_admission_year . ' 年', 0, 'L', 0);
        }
        // 大学院卒業年
        if($user->grad_graduation_year){
            $this->pdf->SetXY(55, 95);
            $this->pdf->MultiCell(139, 5, $user->grad_graduation_year . ' 年', 0, 'L', 0);
        }
        // 研究内容
        $this->pdf->SetXY(55, 102);
        $this->pdf->MultiCell(139, 5, $user->research_content, 0, 'L', 0);

        // 資格・スキル
        $this->pdf->SetXY(55, 109);
        $this->pdf->MultiCell(139, 5, $user->skill, 0, 'L', 0);

        // 部活・サークル・団体等
        $this->pdf->SetXY(55, 116);
        $this->pdf->MultiCell(139, 14, $user->club_etc, 0, 'L', 0);

        // N-aikuを知ったきっかけ
        $this->pdf->SetXY(55, 148);
        $this->pdf->MultiCell(139, 14, $user->opportunity_to_know, 0, 'L', 0);

        // インターンで成長させたい力
        $this->pdf->SetXY(55, 162);
        $this->pdf->MultiCell(139, 14, $user->improve_ability, 0, 'L', 0);

        // 過去に参加したインターン
        $this->pdf->SetXY(55, 176);
        $this->pdf->MultiCell(139, 14, $user->experienced_company, 0, 'L', 0);

        // インターンで希望する職種
        $this->pdf->SetXY(55, 190);
        $this->pdf->MultiCell(139, 14, $user->occupation_lg->name, 0, 'L', 0);

        // 今の自分を採点するとしたら
        $this->pdf->SetXY(55, 222);
        $this->pdf->MultiCell(139, 14, $user->self_score . ' 点', 0, 'L', 0);

        // 点数の理由
        $this->pdf->SetXY(55, 236);
        $this->pdf->MultiCell(139, 21, $user->score_reason, 0, 'L', 0);

        // 理想に近づくために必要なこと
        $this->pdf->SetXY(55, 257);
        $this->pdf->MultiCell(139, 19, $user->necessary, 0, 'L', 0);

        if($user->interview_content){ // 面談情報が入力されている場合のみ２ページ目以降を追加する

            // pdf２ページ目（面談情報①）
            $this->pdf->AddPage();
            $tpl = $this->pdf->importPage(2); // テンプレートPDFの2ページ目
            $this->pdf->useTemplate($tpl);
            $this->pdf->SetFont('kozgopromedium', '', 8);
            $this->pdf->SetFontSize(10);
    
            // 値出力位置指定
            // 現在の自分はどんな自分か？
            $this->pdf->SetXY(55, 28);
            $this->pdf->MultiCell(139, 50, $user->interview_content->current_self, 0, 'L', 0);

            // 5年後、自分はどうありたいか？
            $this->pdf->SetXY(55, 79);
            $this->pdf->MultiCell(139, 50, $user->interview_content->five_years_later, 0, 'L', 0);
    
            // 上記の理想に近づくためには現状をどう変えていけばよいか？
            $this->pdf->SetXY(55, 129.5);
            $this->pdf->MultiCell(139, 50, $user->interview_content->improvement, 0, 'L', 0);

            // インターン後どうなっていたいか？
            $this->pdf->SetXY(55, 180.5);
            $this->pdf->MultiCell(139, 50, $user->interview_content->after_intern, 0, 'L', 0);

            // インターンでやりたいことはどんなことか？
            $this->pdf->SetXY(55, 231);
            $this->pdf->MultiCell(139, 45, $user->interview_content->intern_aspiration, 0, 'L', 0);

            // pdf３ページ目（面談情報②）
            $this->pdf->AddPage();
            $tpl = $this->pdf->importPage(3); // テンプレートPDFの3ページ目
            $this->pdf->useTemplate($tpl);
            $this->pdf->SetFont('kozgopromedium', '', 8);
            $this->pdf->SetFontSize(10);

            // 値出力位置指定
            // 自分自身の強みがどのようにインターン先に影響すると思うか
            $this->pdf->SetXY(55, 27);
            $this->pdf->MultiCell(139, 45, $user->interview_content->strengths_affect, 0, 'L', 0);

            // インターン先の条件または希望はあるか
            $this->pdf->SetXY(55, 74);
            $this->pdf->MultiCell(139, 45, $user->interview_content->intern_condition, 0, 'L', 0);

            // 自由記入欄１
            $this->pdf->SetXY(55, 120);
            $this->pdf->MultiCell(139, 38, $user->interview_content->free_description1, 0, 'L', 0);

            // 自由記入欄２
            $this->pdf->SetXY(55, 159.5);
            $this->pdf->MultiCell(139, 38, $user->interview_content->free_description2, 0, 'L', 0);

            // 自由記入欄３
            $this->pdf->SetXY(55, 198);
            $this->pdf->MultiCell(139, 38, $user->interview_content->free_description3, 0, 'L', 0);

            // 面談者からの一言
            $this->pdf->SetXY(55, 237);
            $this->pdf->MultiCell(139, 39, $user->interview_content->appeal_point, 0, 'L', 0);

        }

        $this->pdf->Output(); // 画面出力
        return true;

    }

    // 求人票PDF出力
    public function offerPdf(Request $request, String $id)
    {
        // 求人情報データ
        $offer = \App\InternOffer::with('company')->find($id); 

        $this->pdf = new Fpdi('P', 'mm');
        $this->pdf->setSourceFile(public_path('/pdf/kyuujinhyou.pdf')); // テンプレートPDFの設定
        $this->pdf->setPrintHeader(false); // pdf上部の罫線を非表示に

        // pdf１ページ目
        $this->pdf->AddPage();
        $tpl = $this->pdf->importPage(1); // テンプレートPDFの1ページ目
        $this->pdf->useTemplate($tpl);
        $this->pdf->SetFont('kozgopromedium', '', 8);
        $this->pdf->SetFontSize(10);

        // 値出力位置指定
        // 会社名
        $this->pdf->SetXY(55, 27);
        $this->pdf->MultiCell(139, 5, $offer->company->name, 0, 'L', 0);

        // 住所
        $this->pdf->SetXY(55, 33);
        $this->pdf->MultiCell(139, 13, $offer->company->address, 0, 'L', 0);

        // 資本金
        $this->pdf->SetXY(55, 48);
        $this->pdf->MultiCell(139, 5, $offer->company->capital, 0, 'L', 0);

        // 創業年度
        $this->pdf->SetXY(55, 55);
        $this->pdf->MultiCell(139, 5, $offer->company->established_year.' 年', 0, 'L', 0);

        // 従業員数
        $this->pdf->SetXY(55, 62);
        $this->pdf->MultiCell(139, 5, $offer->company->employee_number.' 名', 0, 'L', 0);

        // 代表取締役
        $this->pdf->SetXY(55, 69);
        $this->pdf->MultiCell(139, 5, $offer->company->ceo_name, 0, 'L', 0);

        // 担当者名
        $this->pdf->SetXY(55, 76);
        $this->pdf->MultiCell(139, 5, $offer->pic_name, 0, 'L', 0);

        // インターンタイトル
        $this->pdf->SetXY(55, 98);
        $this->pdf->MultiCell(139, 13, $offer->title, 0, 'L', 0);

        // インターンシップ概要
        $this->pdf->SetXY(55, 112);
        $this->pdf->MultiCell(139, 162, $offer->desciption, 0, 'L', 0);


        // pdf２ページ目
        $this->pdf->AddPage();
        $tpl = $this->pdf->importPage(2); // テンプレートPDFの2ページ目
        $this->pdf->useTemplate($tpl);
        $this->pdf->SetFont('kozgopromedium', '', 8);
        $this->pdf->SetFontSize(10);

        // 値出力位置指定
        // 求める人物像
        $this->pdf->SetXY(55, 27);
        $this->pdf->MultiCell(139, 62, $offer->required_human_resource, 0, 'L', 0);

        // 求めるスキル
        $this->pdf->SetXY(55, 89);
        $this->pdf->MultiCell(139, 30, $offer->required_human_skill, 0, 'L', 0);

        // インターンを通して得ることができる力
        $this->pdf->SetXY(55, 120);
        $this->pdf->MultiCell(139, 30, $offer->acquirable_ability, 0, 'L', 0);

        // 求める稼働日数・時間
        $this->pdf->SetXY(55, 151);
        $this->pdf->MultiCell(139, 5, $offer->required_work_hours, 0, 'L', 0);

        // 給与
        $this->pdf->SetXY(55, 159);
        $this->pdf->MultiCell(139, 5, $offer->salary, 0, 'L', 0);

        // 担当者コメント
        $this->pdf->SetXY(55, 166);
        $this->pdf->MultiCell(139, 110, $offer->appeal_point,  0, 'L', 0);


        $this->pdf->Output(); // 画面出力
        return true;

    }

    // WEBCABデータアップロード
    public function pdfUpload(Request $request, $id)
    {
        // 一応バリデーション
        $this->validate($request, ['pdf_file' => 'required'], ['pdf_file.required' => 'ファイルを選択して下さい。']);

        //アップロード先
        $upload_path = env('AWS_BUCKET_ROOT') . '/WEBCAB_PDF';
        // dd(Storage::disk('s3')->allFiles());
        try {
            if(\App\WebcabData::where('user_id', $id)->first()){ // アップロードが初めてかどうか判定
                $webcab_data = \App\WebcabData::where('user_id', $id)->first();
                // 以前に保存済みのファイルをs3から削除する
                Storage::disk('s3')->delete($upload_path . '/' . basename($webcab_data->pdf_url));
            }else{
                $webcab_data = new \App\WebcabData();
            }

            //墨塗処理実行
            $pdf = new Fpdi('L');
            $pdf->setSourceFile($request->file('pdf_file')->getPathname());
            $pdf->addPage();
            $tpl = $pdf->importPage(1);
            $pdf->useTemplate($tpl);
            //実施日墨塗
            $pdf->Rect(77.0, 10.05, 26, 9, 'F');
            //氏名〜メールアドレス墨塗
            $pdf->Rect(121.5, 10.05, 124.8, 9, 'F');
            //ファイル名生成
            $file_name = uniqid() . '.pdf';
            //publicフォルダ直下にファイル作成
            $local_file_path = public_path($file_name);
            $pdf->Output($local_file_path, "F");
            
            //S3にファイルアップロード
            $pdf_path = Storage::disk('s3')->putFile($upload_path, $local_file_path, 'public');
            $pdf_url = Storage::disk('s3')->url($pdf_path);
            $webcab_data->pdf_url = $pdf_url;
            $webcab_data->user_id = $id;
            $webcab_data->save();

            // publicフォルダに作成していたファイルを削除する
            File::delete($local_file_path);

            $message = 'ファイルをアップロードしました。';
        } catch (\Exception $ex) {
            \Log::debug('WEBCAB PDFアップロード中にエラー発生', [
                'CODE' => $ex->getCode(),
                'MESSAGE' => $ex->getMessage(),
                'LINE' => $ex->getLine(),
            ]);
            $message = 'ファイルのアップロードに失敗しました。';
        }

        $request->session()->flash('msg', $message);
        return redirect('user/detail_user/'.$id)->withInput();
    }

    public function pdf_webcab_chow(Request $request){
        $url = $request->get('url');
        return redirect($url);
    }

}

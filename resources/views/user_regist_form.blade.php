
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="ROBOTS" content="NOINDEX,NOFOLLOW">
        <title>N-aiku</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}">
        <!-- jQuery UI -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
        <!-- TimePicker -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css" crossorigin="anonymous">
        
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <!-- 追加修正CSS -->
        <style>
            .main-footer, .content-wrapper {margin: 0;}
            .error {color: red;}
        </style>
    </head>
<body>

<div class="content-wrapper p-5">
    <div class="card card-info card-outline mx-auto col-md-10 col-lg-6" style="max-width: 800px;">

        <div class="card-header p-5" style='background-color: #fff; border-bottom: 1px solid rgba(0, 0, 0, .125);'>
            <h2>【有給インターン】申し込みフォーム</h2>
            <p class="mt-4 mb-0"><small>
                この度は有給インターンシップへの申し込みをありがとうございます。下記の質問とアンケートにお答えいただきますよう、よろしくお願いいたします。所要時間は10分程度です。<br>
                回答受領後、こちらから適性検査と面談のご案内を差し上げます。適性検査および面談は、皆様の人柄や価値観、論理的思考能力を把握するために実施いたします。弊社内で選考が実施されるわけではありませんので、ご心配なきようよろしくお願いいたします。<br>
                弊社にて収集した個人情報は、有給インターンシップ事業以外の用途で使用することはありません。また、収集した個人情報を第三者に提供または委託管理をすることはありません。
            </small></p>
        </div>
        <div class="card-body">
            @if(count($errors) > 0)
            <p class="valid-msg text-center font-weight-bold text-danger">入力に問題があります。再入力して下さい。</p>
            @elseif(session('msg'))
            <p class="message text-center font-weight-bold text-danger">{{session('msg')}}</p>
            @endif

            <form class="user_regist_form" action="{{url('user/regist')}}" method="post">
                {{ csrf_field() }}

                <div class="form-group mb-5">
                    <label>1. 氏名</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="form-row">
                        <label for="family_name" class="col-sm-1 text-center col-form-label">姓</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="family_name" name="family_name" value="{{old('family_name')}}">
							@if($errors->has('family_name'))<p class="valid-msg text-danger">{{$errors->first('family_name')}}</p>@endif
                        </div>
                        <label for="first_name" class="col-sm-1 text-center col-form-label">名</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{old('first_name')}}">
                            @if($errors->has('first_name'))<p class="valid-msg text-danger">{{$errors->first('first_name')}}</p>@endif
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>2. 氏名（カタカナ）</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="form-row">
                        <label for="family_name_kana" class="col-sm-1 text-center col-form-label">セイ</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="family_name_kana" name="family_name_kana" value="{{old('family_name_kana')}}">
                            @if($errors->has('family_name_kana'))<p class="valid-msg text-danger">{{$errors->first('family_name_kana')}}</p>@endif
                        </div>
                        <label for="first_name_kana" class="col-sm-1 text-center col-form-label">メイ</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="first_name_kana" name="first_name_kana" value="{{old('first_name_kana')}}">
                            @if($errors->has('first_name_kana'))<p class="valid-msg text-danger">{{$errors->first('first_name_kana')}}</p>@endif
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>3. 性別</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="male" name="gender" value="0" @if(old('gender') == "0") checked @endif>
                            <label for="male" class="form-check-label text-center col-form-label">男</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="female" name="gender" value="1" @if(old('gender') == "1") checked @endif>
                            <label for="female" class="form-check-label text-center col-form-label">女</label>
                        </div>
                        @if($errors->has('gender'))<p class="valid-msg text-danger">{{$errors->first('gender')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>4. 生年月日</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <input type="text" class="form-control date-input" name="birthday" placeholder="yyyy/mm/dd" value="{{old('birthday')}}">
                        @if($errors->has('birthday'))<p class="valid-msg text-danger">{{$errors->first('birthday')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>5. 郵便番号</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="zip" placeholder="半角数字、ハイフン無し" value="{{old('zip')}}">
                        @if($errors->has('zip'))<p class="valid-msg text-danger">{{$errors->first('zip')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>6. 住所</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <textarea type="text" class="form-control" name="address" 
                        placeholder="英数字は半角で記入（例：愛知県名古屋市東区葵1-26-8　葵ビル5階）">{{old('address')}}</textarea>
                        @if($errors->has('address'))<p class="valid-msg text-danger">{{$errors->first('address')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>7. メールアドレス</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="mail" placeholder="半角英数字" value="{{old('mail')}}">
                        @if($errors->has('mail'))<p class="valid-msg text-danger">{{$errors->first('mail')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>8. 電話番号</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="tel" placeholder="半角数字、ハイフン無し" value="{{old('tel')}}">
                        @if($errors->has('tel'))<p class="valid-msg text-danger">{{$errors->first('tel')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>9. 所属している大学（卒業した大学）</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <select class="form-control col-sm-12 col-md-6" name="university_id">
                            <option value=""></option>
                            @foreach($universities as $university)
                            <option value="{{$university->id}}" @if($university->id == old('university_id')) selected @endif>{{$university->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('university_id'))<p class="valid-msg text-danger">{{$errors->first('university_id')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>10. 9でその他を選んだ方は、大学名を正式名称で記入して下さい。</label>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="university_name" value="{{old('university_name')}}">
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>11. 所属している学部（卒業した学部）</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <select class="form-control col-sm-12 col-md-6" name="undergraduate_id">
                            <option value=""></option>
                            @foreach($undergraduates as $undergraduate)
                            <option value="{{$undergraduate->id}}" @if($undergraduate->id == old('undergraduate_id')) selected @endif>{{$undergraduate->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('undergraduate_id'))<p class="valid-msg text-danger">{{$errors->first('undergraduate_id')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>12. 11でその他を選んだ方は、学部名を正式名称で記入して下さい。</label>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="undergraduate_name" value="{{old('undergraduate_name')}}">
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>13. 大学入学年</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <select class="form-control col-sm-12 col-md-6" name="admission_year">
                            <option value=""></option>
                            @for( $i = date("Y"); $i >= date("Y",strtotime("-12 year")); $i-- )
                            <option value={{ $i }} @if($i == old('admission_year')) selected @endif>{{ $i }}年</option>
                            @endfor
                        </select>
                        @if($errors->has('admission_year'))<p class="valid-msg text-danger">{{$errors->first('admission_year')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>14. 大学卒業年</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <select class="form-control col-sm-12 col-md-6" name="graduation_year">
                            <option value=""></option>
                            @for( $i = date("Y",strtotime("+4 year")); $i >= date("Y",strtotime("-8 year")); $i-- )
                            <option value={{ $i }} @if($i == old('graduation_year')) selected @endif>{{ $i }}年</option>
                            @endfor
                        </select>
                        @if($errors->has('graduation_year'))<p class="valid-msg text-danger">{{$errors->first('graduation_year')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>15. 所属している大学院（卒業した大学院）</label>
                    <div class="ml-3">
                        <select class="form-control col-sm-12 col-md-6" name="grad_school_id">
                            <option value=""></option>
                            @foreach($grad_schools as $grad_school)
                            <option value="{{$grad_school->id}}" @if($grad_school->id == old('grad_school_id')) selected @endif>{{$grad_school->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>16. 15でその他を選んだ方は、大学院名を正式名称で記入して下さい。</label>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="grad_school_name" value="{{old('grad_school_name')}}">
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>17. 大学院入学年</label>
                    <div class="ml-3">
                        <select class="form-control col-sm-12 col-md-6" name="grad_admission_year">
                            <option value=""></option>
                            @for( $i = date("Y"); $i >= date("Y",strtotime("-8 year")); $i-- )
                            <option value={{ $i }} @if($i == old('grad_admission_year')) selected @endif>{{ $i }}年</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>18. 大学院卒業年</label>
                    <div class="ml-3">
                        <select class="form-control col-sm-12 col-md-6" name="grad_graduation_year">
                            <option value=""></option>
                            @for( $i = date("Y",strtotime("+2 year")); $i >= date("Y",strtotime("-6 year")); $i-- )
                            <option value={{ $i }} @if($i == old('grad_graduation_year')) selected @endif>{{ $i }}年</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>19. 研究室・ゼミ・専攻</label>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="seminar_etc" value="{{old('seminar_etc')}}">
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>20. 研究内容</label>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="research_content" value="{{old('research_content')}}">
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>21. インターンで希望する職種</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <select class="form-control col-sm-12 col-md-6" name="occupation_lg_id">
                            <option value=""></option>
                            @foreach($occupation_lgs as $occupation_lg)
                            <option value="{{$occupation_lg->id}}" @if($occupation_lg->id == old('occupation_lg_id')) selected @endif>{{$occupation_lg->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('occupation_lg_id'))<p class="valid-msg text-danger">{{$errors->first('occupation_lg_id')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>22. 保有資格、専門スキル</label>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="skill" placeholder="例）TOEIC：950点、プログラミング言語：Java" value="{{old('skill')}}">
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>23. 部活・サークル・団体等、活動しているもの</label>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="club_etc" value="{{old('club_etc')}}">
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>24. N-aikuを知ったきっかけは何ですか？（複数回答可）</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="form-check ml-3">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="opportunity_to_know[0]" value="Twitter" @if(old('opportunity_to_know.0') == "Twitter") checked @endif>Twitter
                        </label><br>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="opportunity_to_know[1]" value="Instagram" @if(old('opportunity_to_know.1') == "Instagram") checked @endif>Instagram
                        </label><br>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="opportunity_to_know[2]" value="紹介" @if(old('opportunity_to_know.2') == "紹介") checked @endif>紹介
                        </label><br>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="opportunity_to_know[3]" value="口コミ" @if(old('opportunity_to_know.3') == "口コミ") checked @endif>口コミ
                        </label><br>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="other-checked" @if(old('opportunity_to_know.4')) checked @endif>その他：
                            <input type="text" class="form-control-sm" id="othertext" name="opportunity_to_know[4]" value="{{old('opportunity_to_know.4')}}" @if(!old('opportunity_to_know.4')) disabled @endif>
                        </label>
                        @if($errors->has('opportunity_to_know'))<p class="valid-msg text-danger">{{$errors->first('opportunity_to_know')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>25. インターンで成長させたい力は何ですか？</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <p class="font-italic small">
                            例）コミュニケーション能力：相手の隠れたニーズを吸い出し、ニーズに合った提案をする力<br>
                            　　論理的思考能力：物事を構造的にとらえる能力×伝達力
                        </p>
                        <textarea type="text" class="form-control cancelEnter" name="improve_ability" maxlength="110"
                            placeholder="150字以内、改行不可　&#13;&#10;※なるべく具体的に記述してください">{{old('improve_ability')}}</textarea>
                            @if($errors->has('improve_ability'))<p class="valid-msg text-danger">{{$errors->first('improve_ability')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>26. 過去にインターンに参加されたことはありますか？</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input experienced" id="yes" name="participation_experience" value="0"
                            @if(old('participation_experience') == "0") checked @endif>
                            <label for="yes" class="form-check-label text-center col-form-label">なし</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input experienced" id="no" name="participation_experience" value="1"
                            @if(old('participation_experience') == "1") checked @endif>
                            <label for="no" class="form-check-label text-center col-form-label">あり</label>
                        </div>
                        @if($errors->has('participation_experience'))<p class="valid-msg text-danger">{{$errors->first('participation_experience')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>27. 参加企業名を教えてください。</label>
                    <span class="badge badge-danger ml-2 exp_company_label" style="display: none;">必須</span>
                    <div class="ml-3">
                        <textarea type="text" class="form-control cancelEnter" name="experienced_company" maxlength="110"
                            placeholder="１１０字以内、改行不可" id="experienced_company">{{old('experienced_company')}}</textarea>
                        @if($errors->has('experienced_company'))<p class="valid-msg text-danger">{{$errors->first('experienced_company')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>28. 今の自分は100点満点中、何点ですか？</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="self_score" placeholder="半角数字（例：70）" value="{{old('self_score')}}">
                        @if($errors->has('self_score'))<p class="valid-msg text-danger">{{$errors->first('self_score')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>29. 28の理由を教えてください。</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <textarea type="text" class="form-control cancelEnter" name="score_reason" maxlength="150"
                            placeholder="150字以内、改行不可&#13;&#10;（例：70点→アクションを起こしている、30点→自信がない）">{{old('score_reason')}}</textarea>
                        @if($errors->has('score_reason'))<p class="valid-msg text-danger">{{$errors->first('score_reason')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>30. 理想に近づくために、あなたが必要だと思うことは何ですか？</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <textarea type="text" class="form-control cancelEnter" name="necessary" maxlength="150" placeholder="150字以内、改行不可">{{old('necessary')}}</textarea>
                        @if($errors->has('necessary'))<p class="valid-msg text-danger">{{$errors->first('necessary')}}</p>@endif
                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn-lg btn-danger px-5">
                        <span class="font-weight-bolder">送信する</span>
                    </button>
                </div>

            </form>
        </div> 
    </div>

</div>

<footer class="main-footer">
    <strong>Copyright &copy; 2020 Snapshot, Inc.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer>



<!-- jQuery -->
<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<!-- <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- jQuery validate 1.17.0 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<!-- TimePicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js" crossorigin="anonymous"></script>

<script type="text/javascript">
$(function () {

    $('.date-input').datepicker({
        dateFormat: 'yy/mm/dd',
        changeYear: true,
        changeMonth: true,
        yearRange: "-100:",
        maxDate: "-18Y"
    });

    // textareaの改行を禁止
    $(".cancelEnter").on('keydown', function (e) {
        if(e.key == 'Enter'){
            return false;
        }
    });

    // チェックボックスでその他選択時にテキスト入力許可を切替
    $("#other-checked").on('change', function () {
        if($(this).prop("checked")){
            $("#othertext").prop('disabled', false);
        } else {
            $("#othertext").prop('disabled', true);
        }
    });

    // インターン参加経験選択時に企業名欄入力許可を切替、必須ラベル表示切替
    $(".experienced").on('change', function () {
        if($(this).val() == 1){
            $("#experienced_company").prop('disabled', false);
            $(".exp_company_label").show();
        } else {
            $("#experienced_company").prop('disabled', true);
            $(".exp_company_label").hide();
        }
    });
    // サーバーバリデーションエラー時に、インターン参加経験選択時の表示処理
    if("{{old('participation_experience') == '1'}}"){
        $("#experienced_company").prop('disabled', false);
        $(".exp_company_label").show();
    } else {
        $("#experienced_company").prop('disabled', true);
        $(".exp_company_label").hide();
    }

    // フォームバリデーション
    $('form').validate({
        rules: {
            family_name: { required: true },
            first_name: { required: true },
            family_name_kana: { required: true, zenkakuKatakana: true },
            first_name_kana: { required: true, zenkakuKatakana: true },
            gender: { required: true },
            birthday: { required: true, date: true },
            zip: { required: true, number: true, rangelength: [7, 7] },
            address: { required: true },
            mail: { required: true, email: true },
            tel: { required: true, number: true },
            university_id: { required: true },
            undergraduate_id: { required: true },
            admission_year: { required: true },
            graduation_year: { required: true },
            occupation_lg_id: { required: true },
            'opportunity_to_know[]': { required: true },
            improve_ability: { required: true, maxlength: 110 },
            participation_experience: { required: true },
            experienced_company: { maxlength: 110 },
            self_score: { required: true, number:true },
            score_reason: { required: true, maxlength: 150 },
            necessary: { required: true, maxlength: 150 },
        },
        messages: {
            family_name: { required: '入力して下さい。' },
            first_name: { required: '入力して下さい。' },
            family_name_kana: { required: '入力して下さい。' },
            first_name_kana: { required: '入力して下さい。' },
            gender: { required: '選択して下さい。' },
            birthday: { required: '入力して下さい。', date: '有効な日付を入力して下さい。' },
            zip: { required: '入力して下さい。', number: '半角数字のみ入力して下さい。', rangelength: '7桁で入力して下さい。' },
            address: { required: '入力して下さい。' },
            mail: { required: '入力して下さい。', email: 'メールアドレスの形式が不正です。' },
            tel: { required: '入力して下さい。', number: '半角数字のみ入力して下さい。' },
            university_id: { required: '入力して下さい。' },
            undergraduate_id: { required: '入力して下さい。' },
            admission_year: { required: '入力して下さい。' },
            graduation_year: { required: '入力して下さい。' },
            occupation_lg_id: { required: '入力して下さい。' },
            'opportunity_to_know[]': { required: '一つ以上選択して下さい。' },
            improve_ability: { required: '入力して下さい。' , maxlength: '110字以内で入力して下さい。'},
            participation_experience: { required: '選択して下さい。' },
            experienced_company: { maxlength: '110字以内で入力して下さい。' },
            self_score: { required: '入力して下さい。',number: '半角数字のみ入力してください。' },
            score_reason: { required: '入力して下さい。' , maxlength: '150字以内で入力して下さい。' },
            necessary: { required: '入力して下さい。' , maxlength: '150字以内で入力して下さい。' },
        },
        errorPlacement: function(error, element) {
            if (element.is(':radio')) {
                element.parent().parent().append(error);
            } else {
                element.parent().append(error);
            }
        }
    });
    jQuery.validator.addMethod( // 全角カタカナのみ
        "zenkakuKatakana",
        function(value, element) {
            return this.optional(element) || /^([ァ-ヶー]+)$/.test(value);
        },
        "全角カタカナを入力してください"
    );

});
</script>
</body>
</html>

@extends('layout.layout_blank')
@section('contents')
<section class='content'>
    <div class="card">
        <div class="card-body card-guide-ss">
            <div class="row ml-2">
                <div>
                    <i class="fas fa-file-alt mr-1"></i>
                    求人管理
                </div>
                <div class="ml-2">
                    <i class="fas fa-angle-right mr-1"></i>
                    求人情報登録
                </div>
            </div>
        </div>
    </div>

    
    <div class="card card-info card-outline mx-auto col-md-10 col-lg-6" style="max-width: 800px;">

        <div class="card-header p-5" style='background-color: #fff; border-bottom: 1px solid rgba(0, 0, 0, .125);'>
            <h2>求人情報登録フォーム</h2>
            <p class="mt-4 mb-0"><small>
                企業担当者の方は、こちらに企業の情報を入力して下さい。
            </small></p>
        </div>
        <div class="card-body">
            @if(count($errors) > 0)
            <p class="valid-msg text-center font-weight-bold text-danger">入力に問題があります。再入力して下さい。</p>
            @elseif(session('msg'))
            <p class="message text-center font-weight-bold text-danger">{{session('msg')}}</p>
            @endif

            <form class="offer_regist_form" action="{{url('offer/regist')}}" method="post">
                {{ csrf_field() }}

                <div class="form-group mb-5">
                    <label>企業選択</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <select class="form-control col-sm-12 col-md-6" name="company_id">
                            <option value="">新たに企業を登録する</option>
                            @foreach($companies as $company)
                            <option value="{{$company->id}}" @if($company->id == old('company_id')) selected @endif>{{$company->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('university_id'))<p class="valid-msg text-danger">{{$errors->first('university_id')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5 company-info">
                    <label>企業名</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        @if($errors->has('name'))<p class="valid-msg text-danger">{{$errors->first('name')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5 company-info">
                    <label>住所</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <textarea type="text" class="form-control" name="address">{{old('address')}}</textarea>
                        @if($errors->has('address'))<p class="valid-msg text-danger">{{$errors->first('address')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5 company-info">
                    <label>資本金</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="capital" value="{{old('capital')}}">
                        @if($errors->has('capital'))<p class="valid-msg text-danger">{{$errors->first('capital')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5 company-info">
                    <label>創業年度</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="established_year" placeholder="半角数字のみ記入" value="{{old('established_year')}}">
                        @if($errors->has('established_year'))<p class="valid-msg text-danger">{{$errors->first('established_year')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5 company-info">
                    <label>従業員数</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="employee_number" placeholder="半角数字のみ記入" value="{{old('employee_number')}}">
                        @if($errors->has('employee_number'))<p class="valid-msg text-danger">{{$errors->first('employee_number')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5 company-info">
                    <label>代表取締役</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="ceo_name" value="{{old('ceo_name')}}">
                        @if($errors->has('ceo_name'))<p class="valid-msg text-danger">{{$errors->first('ceo_name')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>インターン担当者</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="pic_name" value="{{old('pic_name')}}">
                        @if($errors->has('pic_name'))<p class="valid-msg text-danger">{{$errors->first('pic_name')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>インターン担当者 メールアドレス</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="pic_mail" placeholder="半角英数字" value="{{old('pic_mail')}}">
                        @if($errors->has('pic_mail'))<p class="valid-msg text-danger">{{$errors->first('pic_mail')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>インターン担当者 電話番号</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="pic_tel" placeholder="半角数字、ハイフン無し" value="{{old('pic_tel')}}">
                        @if($errors->has('pic_tel'))<p class="valid-msg text-danger">{{$errors->first('pic_tel')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>インターン担当者 所属部署</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="pic_dept" value="{{old('pic_dept')}}">
                        @if($errors->has('pic_dept'))<p class="valid-msg text-danger">{{$errors->first('pic_dept')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>インターン担当者 役職</label>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="pic_position" value="{{old('pic_position')}}">
                        @if($errors->has('pic_position'))<p class="valid-msg text-danger">{{$errors->first('pic_position')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>インターンタイトル</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="title" value="{{old('title')}}">
                        @if($errors->has('title'))<p class="valid-msg text-danger">{{$errors->first('title')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>インターンシップ概要</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <p class="font-italic small">
                            箇条書きで記入。<br>
                            例）・コンサルティング営業<br>
                            　　　○○のコンサルを既存取引先に実施<br>
                            　　・経理業務の支援<br>
                            　　　一般的な仕訳業務と売掛台帳、買掛台帳への登録
                        </p>
                        <textarea type="text" class="form-control" name="desciption" rows="7">{{old('desciption')}}</textarea>
                        @if($errors->has('desciption'))<p class="valid-msg text-danger">{{$errors->first('desciption')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>求める人物像</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <p class="font-italic small">
                            箇条書きで。根拠もわかれば記入。<br>
                            例）・情熱のある人<br>
                            　　　タフな交渉をすることが多いため。熱い思いをもって取り組んでほしい。<br>
                            　　・成長意欲のある人<br>
                            　　・論理的な話し方をできる人<br>
                        </p>
                        <textarea type="text" class="form-control" name="required_human_resource">{{old('required_human_resource')}}</textarea>
                        @if($errors->has('required_human_resource'))<p class="valid-msg text-danger">{{$errors->first('required_human_resource')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>求めるスキル</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <textarea type="text" class="form-control" name="required_human_skill">{{old('required_human_skill')}}</textarea>
                        @if($errors->has('required_human_skill'))<p class="valid-msg text-danger">{{$errors->first('required_human_skill')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>インターンを通して得ることができる力</label>
                    <span class="badge badge-danger ml-2">必須</span>
                    <div class="ml-3">
                        <textarea type="text" class="form-control" name="acquirable_ability">{{old('acquirable_ability')}}</textarea>
                        @if($errors->has('acquirable_ability'))<p class="valid-msg text-danger">{{$errors->first('acquirable_ability')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>求める稼働日数および稼働時間を教えてください。</label>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="required_work_hours" placeholder="例：週〇日以上、1日〇時間以上" value="{{old('required_work_hours')}}">
                        @if($errors->has('required_work_hours'))<p class="valid-msg text-danger">{{$errors->first('required_work_hours')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>時給等、給与が事前に分かれば教えてください。</label>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="salary" value="{{old('salary')}}">
                        @if($errors->has('salary'))<p class="valid-msg text-danger">{{$errors->first('salary')}}</p>@endif
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label>その他ポイント</label>
                    <div class="ml-3">
                        <textarea type="text" class="form-control" name="appeal_point">{{old('appeal_point')}}</textarea>
                        @if($errors->has('appeal_point'))<p class="valid-msg text-danger">{{$errors->first('appeal_point')}}</p>@endif
                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn-lg btn-danger px-5" @if(session('regist_flg'))disabled @endif>
                        <span class="font-weight-bolder">登録する</span>
                    </button>
                </div>

            </form>
        </div> 
    </div>


</section>


<!-- /.content-wrapper -->
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.16/clipboard.min.js"></script>

<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<script type='text/javascript'>
$(function () {

    // 企業選択プルダウンで既存企業選択時に企業情報入力欄を非表示にする
    $("select[name='company_id']").on('change', function () {
        if($(this).val()){
            $(".company-info input, .company-info textarea").prop('disabled', true);
            $(".company-info").hide();
        } else {
            $(".company-info input, .company-info textarea").prop('disabled', false);
            $(".company-info").show();
        }
    });

    // サーバーバリデーションエラー時に、企業選択時の表示処理
    if("{{old('company_id')}}"){
        $(".company-info").hide();
    } else {
        $(".company-info").show();
    }

});
</script>

@endsection
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
                    求人詳細
                </div>
            </div>
        </div>
    </div>

    <div class='row'>
        <div class='col-lg-12'>
            <div class="card card-blue card-outline">
                <div class="card-header">
                    <div class="row ml-1 mr-1 justify-content-between">
                        <div class="m-2">
                            <i class="fas fa-file-alt mr-1"></i>
                            求人情報詳細
                        </div>
                        <a type="button" href="{{url('pdf/offer/').'/'.$offer->id}}" class="btn btn-primary" style="margin: 0 0 0 auto;" target="_blank">
                            求人票PDF出力
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row px-3">
                        <div class="col-lg-6">
                            <strong>企業情報</strong>
                            <div class="form-group mt-2 mb-5">
                                <table class="table table-bordered m-0">
                                    <tr>
                                        <td width="140">企業名</td>
                                        <td>{{$offer->company->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>住所</td>
                                        <td style="white-space: pre-wrap;">{{$offer->company->address}}</td>
                                    </tr>
                                    <tr>
                                        <td>資本金</td>
                                        <td>{{$offer->company->capital}}</td>
                                    </tr>
                                    <tr>
                                        <td>創業年度</td>
                                        <td>{{$offer->company->established_year}} 年</td>
                                    </tr>
                                    <tr>
                                        <td>従業員数</td>
                                        <td>{{$offer->company->employee_number}} 名</td>
                                    </tr>
                                    <tr>
                                        <td>代表取締役</td>
                                        <td>{{$offer->company->ceo_name}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div> 
                        <div class="col-lg-6">
                            <strong>インターン担当者情報</strong>
                            <div class="form-group mt-2 mb-5">
                                <table class="table table-bordered m-0">
                                    <tr>
                                        <td width="140">担当者名</td>
                                        <td>{{$offer->pic_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>メールアドレス</td>
                                        <td>{{$offer->pic_mail}}</td>
                                    </tr>
                                    <tr>
                                        <td>電話番号</td>
                                        <td>{{$offer->pic_tel}}</td>
                                    </tr>
                                    <tr>
                                        <td>所属部署</td>
                                        <td>{{$offer->pic_dept}}</td>
                                    </tr>
                                    <tr>
                                        <td>役職</td>
                                        <td>{{$offer->pic_position}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <strong>インターンシップ情報</strong>
                            <div class="form-group mt-2 mb-5">
                                <table class="table table-bordered m-0">
                                    <tr>
                                        <td width="140">インターンタイトル</td>
                                        <td style="white-space: pre-wrap;">{{$offer->title}}</td>
                                    </tr>
                                    <tr>
                                        <td>インターンシップ概要</td>
                                        <td style="white-space: pre-wrap;">{{$offer->desciption}}</td>
                                    </tr>
                                    <tr>
                                        <td>求める人物像</td>
                                        <td style="white-space: pre-wrap;">{{$offer->required_human_resource}}</td>
                                    </tr>
                                    <tr>
                                        <td>求めるスキル</td>
                                        <td style="white-space: pre-wrap;">{{$offer->required_human_skill}}</td>
                                    </tr>
                                    <tr>
                                        <td>インターンを通して得ることができる力</td>
                                        <td style="white-space: pre-wrap;">{{$offer->acquirable_ability}}</td>
                                    </tr>
                                    <tr>
                                        <td>求める稼働日数・時間</td>
                                        <td>{{$offer->required_work_hours}}</td>
                                    </tr>
                                    <tr>
                                        <td>給与</td>
                                        <td>{{$offer->salary}}</td>
                                    </tr>
                                    <tr>
                                        <td>企業担当者からの一言</td>
                                        <td style="white-space: pre-wrap;">{{$offer->appeal_point}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer clearfix">
                </div>
            </div>
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


});
</script>

@endsection
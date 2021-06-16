@extends('layout.layout_blank')
@section('contents')
<section class='content'>
    <div class="card">
        <div class="card-body card-guide-ss">
            <div class="row ml-2">
                <div>
                    <i class="fas fa-file-alt mr-1"></i>
                    学生管理
                </div>
                <div class="ml-2">
                    <i class="fas fa-angle-right mr-1"></i>
                    学生情報一覧
                </div>
            </div>
        </div>
    </div>
    
    <div class='row'>
        <div class="col-lg-12">
            <form action="{{url('user')}}" method="GET"> 
            <div class="card card-blue card-outline">
                <div class="card-header">
                    <div class="row ml-1 mr-1 justify-content-between">
                        <div class="m-2">
                            <i class="fas fas fa-search mr-1"></i>
                            学生情報検索
                        </div>
                        <div class="row justify-content-between" style="margin: 0 0 0 auto;">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                            <button type="button" class="btn btn-info" style="margin-right: 50px; padding: 10px">
                                <i class="fa fa-search-plus mr-1"></i>
                                検索条件
                            </button>
                            </a>
                            <button class="btn btn-success" type="submit">
                                <i class="fas fa-search mr-1"></i>
                                検索
                            </button>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion">
                   <div class="panel panel-default card-body">
                      <div id="collapse3" class="collapse">
                            <div class="row">
                                <div class="form-group col-sm-1 col-md-1">
                                    <label class="control-label" for="id">ID
                                    </label>
                                    <input type="text" id="id" name="id" class="form-control" value="{{Request::get('id')}}">
                                </div>
                                <div class="form-group col-sm-3 col-md-3">
                                    <label class="control-label" for="family_name">姓
                                    </label>
                                    <input type="text" id="family_name" name="family_name" class="form-control" value="{{Request::get('family_name')}}">
                                </div>
                                <div class="form-group col-sm-3 col-md-3">
                                    <label class="control-label" for="first_name">名
                                    </label>
                                    <input type="text" id="first_name" name="first_name" class="form-control" value="{{Request::get('first_name')}}">
                                </div>
                                <div class="form-group col-sm-5 col-md-5">
                                    <label class="control-label" for="occupation_lg">希望職種
                                    </label>
                                    <select class="form-control" id="occupation_lg" name="occupation_lg" autocomplete="off">
                                        <option value=""></option>
                                        @foreach($occupation_lgs as $occupation_lg)
                                        <option value="{{$occupation_lg->id}}" @if($occupation_lg->id == Request::get('occupation_lg')) selected @endif
                                        >{{$occupation_lg->name}}</option>
                                        @endforeach
                                    </select>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-md-4">
                                    <label class="control-label" for="university">大学名
                                    </label>
                                    <select class="form-control" id="university" name="university" autocomplete="off">
                                        <option value=""></option>
                                        @foreach($universities as $university)
                                        <option value="{{$university->id}}" @if($university->id == Request::get('university')) selected @endif
                                        >{{$university->name}}</option>
                                        @endforeach
                                    </select>  
                                </div>
                                <div class="form-group col-sm-4 col-md-4">
                                    <label class="control-label" for="grad_school">大学院名
                                    </label>
                                    <select class="form-control" id="grad_school" name="grad_school" autocomplete="off">
                                        <option value=""></option>
                                        @foreach($grad_schools as $grad_school)
                                        <option value="{{$grad_school->id}}" @if($grad_school->id == Request::get('grad_school')) selected @endif
                                        >{{$grad_school->name}}</option>
                                        @endforeach
                                    </select>  
                                </div>
                                <div class="form-group col-sm-4 col-md-4">
                                    <label class="control-label" for="ss_staff">SS担当者名
                                    </label>
                                    <select class="form-control" id="ss_staff" name="ss_staff" autocomplete="off">
                                        <option value=""></option>
                                        @foreach($ss_staffs as $ss_staff)
                                        <option value="{{$ss_staff->id}}" @if($ss_staff->id == Request::get('ss_staff')) selected @endif
                                        >{{$ss_staff->name}}</option>
                                        @endforeach
                                    </select>  
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
            @csrf
            </form>
        </div>
    </div>

    <div class='row'>
        <div class='col-lg-12'>
            <div class="card card-blue card-outline">
                <div class="card-header">
                    <div class="row ml-1 mr-1 justify-content-between">
                        <div class="m-2">
                            <i class="fas fa-file-alt mr-1"></i>
                            学生情報一覧
                        </div>
                        <div class="row justify-content-between" style="margin: 0 0 0 auto;">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row ml-1 mr-1 justify-content-between table-responsive">
                        <table class="table table-bordered m-0 table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th style="vertical-align: middle; min-width: 80px;">ID</th>
                                    <th style="vertical-align: middle; min-width: 180px;">氏名</th>
                                    <th style="vertical-align: middle; min-width: 180px;">SS担当者</th>
                                    <th style="vertical-align: middle; min-width: 100px;">WEBCAB<br>受験完了</th>
                                    <th style="vertical-align: middle; min-width: 100px;">面談完了</th>
                                    <th style="vertical-align: middle; min-width: 120px;">最後の面談日</th>
                                    <th style="vertical-align: middle; min-width: 120px;">インターン<br>先紹介有無</th>
                                    <th style="vertical-align: middle; min-width: 120px;">マッチング<br>段階</th>
                                    <th style="vertical-align: middle; min-width: 120px;">インターン<br>進捗</th>
                                    <th style="vertical-align: middle; min-width: 220px;">インターン先企業</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr style="cursor: pointer;" class="open_detail" data-id="{{$user->id}}" data-flg="1">
                                    <td class="text-center">{{$user->id}}</td>
                                    <td class="text-center">
                                        {{$user->family_name}} {{$user->first_name}}
                                    </td>
                                    <td class="text-center">
                                        <select class="status-edit form-control" column="ss_staff_id">
                                            <option value=""></option>
                                            @foreach ($ss_staffs as $ss_staff)
                                            <option
                                                value="{{$ss_staff->id}}"
                                                @if(isset($user->ss_staff) && $ss_staff->id == $user->ss_staff->id) selected @endif
                                            >
                                                {{$ss_staff->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        @isset($user->webcab_data->pdf_url)
                                        <button class="btn btn-secondary">完</button>
                                        @else
                                        <button class="btn">未</button>
                                        @endisset
                                    </td>
                                    <td class="text-center">
                                        <select class="status-edit form-control" column="interview_flg">
                                            <option value=""></option>
                                            <option value="0" @if($user->user_status->interview_flg == "0") selected @endif>未</option>
                                            <option value="1" @if($user->user_status->interview_flg == "1") selected @endif>完</option>
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <input
                                            type="text" class="status-edit form-control date-input text-center d-inline-block" column="last_interviewed_at"
                                            style="width: 120px;"
                                            @isset($user->user_status->last_interviewed_at)
                                            value="{{date('Y/m/d', strtotime($user->user_status->last_interviewed_at))}}"
                                            @endisset
                                        >
                                    </td>
                                    <td class="text-center">
                                        <select class="status-edit form-control" column="introduce_flg">
                                            <option value="0">なし</option>
                                            <option value="1" @if($user->user_status->introduce_flg == "1") selected @endif>あり</option>
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <select class="status-edit form-control" column="matching_progress_id">
                                            <option value=""></option>
                                            @foreach ($progresses as $progress)
                                            <option 
                                                value={{$progress->id}}
                                                @if($progress->id == $user->user_status->matching_progress_id) selected @endif
                                            >
                                            {{$progress->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <select class="status-edit form-control" column="intern_status">
                                            <option value=""></option>
                                            <option value="0" @if($user->user_status->intern_status == "0") selected @endif>継続中</option>
                                            <option value="1" @if($user->user_status->intern_status == "1") selected @endif>終了</option>
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <select class="status-edit custom-select select2" autocomplete="off" column="company_id">
                                            <option value=""></option>
                                            @foreach($companies as $company)
                                            <option
                                                value={{$company->id}}
                                                @if($company->id == $user->user_status->company_id) selected @endif
                                            >
                                            {{$company->name}}</option>
                                            @endforeach
                                        </select>  
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        @if($users->count() == 0)
                        <p class="text-center mt-3">学生情報がありません</p>
                        @endif
                    </div>
                </div>
                <div class="card-footer clearfix">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- /.content-wrapper -->
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.16/clipboard.min.js"></script>
<script type='text/javascript'>
$(function () {

    $('.date-input').datepicker({
        dateFormat: 'yy/mm/dd'
    });
  
    $('.select2').select2({
            width: '100%',
            placeholder: '',
            allowClear: true,
            multiple: false
    });
    
    // 学生詳細画面を開く
    $(".open_detail").on('click', function () {
        var url = "{{url('/user')}}" + '/detail_user/' + $(this).data("id");
        window.open(url, '_blank');
        return false;
    });
    // レコードのセレクトボックスをクリック時に学生詳細画面が開くのを防ぐ
    $('.status-edit, span').click(function(event){
        event.stopPropagation();
    });

    // 各ステータス選択時にDB保存処理を行う
    $(".status-edit").on('change', function () {
        var userId = $(this).parents('tr').attr('data-id');
        var column = $(this).attr('column');
        var value = $(this).val();

        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },    
            type: 'POST',
            url: "{{url('user/user_status_edit')}}",
            data: {
                userId: userId,
                column: column,
                value: value
            },
            dataType: 'text'
        }).done(function(data){
            console.log('Ajax Success');
            console.log(data);
        }).fail(function(data) {
            console.log('Ajax Error');
            console.log(data);
        });
    });
    
});
</script>

@endsection
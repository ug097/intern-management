@extends('layout.layout_blank')
@section('contents')
<section class='content'>
    <div class="card">
        <div class="card-body card-guide-ss">
            <div class="row ml-2">
                <div>
                    <i class="fas fa-file-alt mr-1"></i>
                    ユーザー管理
                </div>
                <div class="ml-2">
                    <i class="fas fa-angle-right mr-1"></i>
                    ユーザー一覧
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
                            ユーザー一覧
                        </div>
                        <div class="row justify-content-between" style="margin: 0 0 0 auto;">
                            <a class="btn btn-success" href="{{url('admin/regist_form')}}">
                                <i class="fas fa-pen-square mr-1"></i>新規登録
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row ml-1 mr-1 justify-content-between table-responsive">
                        <table class="table table-bordered m-0 table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th style="vertical-align: middle; min-width: 180px;">担当者名</th>
                                    <th style="vertical-align: middle; min-width: 220px;">メールアドレス</th>
                                    <th style="vertical-align: middle; min-width: 180px;">パスワード</th>
                                    <th style="vertical-align: middle; min-width: 140px;">権限</th>
                                    <th style="vertical-align: middle; min-width: 220px; width: 220px;">編集／削除</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ss_staffs as $ss_staff)
                                <tr>
                                    <td class="text-center">{{$ss_staff->name}}</td>
                                    <td class="text-center">{{$ss_staff->mail}}</td>
                                    <td class="text-center">
                                        @if($ss_staff->id == session('login_staff')->id || session('login_staff')->role == 0)
                                        {{decrypt($ss_staff->password)}}</td>
                                        @endif
                                    <td class="text-center"> @if($ss_staff->role == 0) 管理者 @else スタッフ @endif </td>
                                    <td class="text-center">
                                        @if($ss_staff->id == session('login_staff')->id || session('login_staff')->role == 0)
                                        <a type="button" href="{{url('admin/regist_form').'/'. $ss_staff->id}}" class="btn btn-success px-3 mr-4">
                                            編集
                                        </a>
                                        <button type="button" ss_staff_id="{{$ss_staff->id}}" ss_staff_name="{{$ss_staff->name}}" class="btn btn-danger delete px-3">削除</button>
                                        @endif
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    {{-- {{ $ss_staffs->links() }} --}}
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

    // チェックボックスでその他選択時にテキスト入力許可を切替
    $(".delete").on('click', function () {
        var id = $(this).attr('ss_staff_id');
        var name = $(this).attr('ss_staff_name');

        var result = window.confirm(name + 'さんのアカウントを削除してもよろしいですか？');
        if( result ) {
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },    
                type: 'POST',
                url: "{{url('admin/delete')}}",
                data: { id: id },
                dataType: 'text'
            }).done(function(data){
                alert(data);
                window.location.reload();

            }).fail(function(data) {
                alert(data);
            });
        }
    });


});
</script>

@endsection
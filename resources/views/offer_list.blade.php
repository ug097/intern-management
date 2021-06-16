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
                    求人情報一覧
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
                            求人情報一覧
                        </div>
                        <div class="row justify-content-between" style="margin: 0 0 0 auto;">
                            <a class="btn btn-success" href="{{url('offer/regist_form')}}">
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
                                    <th style="vertical-align: middle; min-width: 180px;">企業名</th>
                                    <th style="vertical-align: middle; min-width: 220px;">インターンタイトル</th>
                                    <th style="vertical-align: middle; min-width: 180px;">SS担当者</th>
                                    <th style="vertical-align: middle; min-width: 140px;">募集中/募集停止</th>
                                    <th style="vertical-align: middle; min-width: 220px;">メモ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($offers as $offer)
                                <tr style="cursor: pointer;" class="open_detail" data-id="{{$offer->id}}" data-flg="1">
                                    <td class="text-center">{{$offer->company->name}}</td>
                                    <td class="text-center">{{$offer->title}}</td>
                                    <td class="text-center">
                                        <select class="status-edit form-control" column="ss_staff_id">
                                            <option value=""></option>
                                            @foreach ($ss_staffs as $ss_staff)
                                            <option
                                                value="{{$ss_staff->id}}"
                                                @if(isset($offer->ss_staff) && $ss_staff->id == $offer->ss_staff->id) selected @endif
                                            >
                                                {{$ss_staff->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <select class="status-edit form-control" column="is_public">
                                            <option value=""></option>
                                            <option value="0" @if($offer->is_public == "0") selected @endif>募集停止</option>
                                            <option value="1" @if($offer->is_public == "1") selected @endif>募集中</option>
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <input type="text" class="status-edit form-control" column="memo" value="{{$offer->memo}}">
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        @if($offers->count() == 0)
                        <p class="text-center mt-3">求人情報がありません</p>
                        @endif
                    </div>
                </div>
                <div class="card-footer clearfix">
                    {{-- {{ $offers->links() }} --}}
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

    // 各ステータス選択時にDB保存処理を行う
    $(".status-edit").on('change', function () {
        var offerId = $(this).parents('tr').attr('data-id');
        var column = $(this).attr('column');
        var value = $(this).val();

        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },    
            type: 'POST',
            url: "{{url('offer/offer_status_edit')}}",
            data: {
                offerId: offerId,
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
    
    // 学生詳細画面を開く
    $(".open_detail").on('click', function () {
        var url = "{{url('/offer')}}" + '/detail_offer/' + $(this).data("id");
        window.open(url, '_blank');
        return false;
    });

    // レコードのセレクトボックスをクリック時に学生詳細画面が開くのを防ぐ
    $('.status-edit').click(function(event){
        event.stopPropagation();
    });

});
</script>

@endsection
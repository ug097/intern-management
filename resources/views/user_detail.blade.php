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
                    詳細
                </div>
            </div>
        </div>
    </div>
    @include('user_detail_data')

</section>


<!-- /.content-wrapper -->
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.16/clipboard.min.js"></script>

<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<script type='text/javascript'>
$(function () {
    $(".regist-btn").on('click', function () {
        $.ajax("{{url('user/interview_regist')}}", {
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },   
            type: 'post',
            data: $(".interview_form").serialize(), 
            dataType: 'text'
        }).done(function(data) {
            console.log('通信成功');
            alert(data);
        }).fail(function(data) {
            console.log('通信失敗');
            alert(data);
        });
    });
});
</script>

@endsection
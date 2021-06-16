@extends('layout.layout')
@section('contents')
<section class='content'>
    <div class="row">
        <div class='col-lg-12'>
            <div class="card card-info card-outline">
                <div class="card-header">
                    <i class="fas fa-envelope mr-1"></i>
                    新着オファー依頼
                </div>
                <div class="card-body">
                    <div class="ml-3 small">
                        システム・運営会社からのお知らせはありません
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-lg-12'>
            <div class="card card-info card-outline">
                <div class="card-header">
                    <i class="fas fa-exclamation-triangle mr-1"></i>
                    新着情報面談依頼
                </div>
                <div class="card-body">
                    <i class="fas fa-comment mr-3"></i>                    
                    <a href="{{url('/message')}}">未読メッセージが1件あります。</a>                    
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-lg-12'>
            <div class="card card-info card-outline">
                <div class="card-header">
                    <i class="fas fa-exclamation-triangle mr-1"></i>
                    企業利用申請
                </div>
                <div class="card-body">
                    <i class="fas fa-comment mr-3"></i>                    
                    <a href="{{url('/apply')}}">未対応の申し込みが{{$applies->count()}}件あります</a>                    
                    <hr>
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
 

});
</script>

@endsection
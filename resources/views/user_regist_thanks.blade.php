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
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}">
    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">

    <!-- 追加修正CSS -->
    <style>
        .main-footer, .content-wrapper, body {margin: 0;}
        html, body {height: 100%;}
        .content-wrapper {height: calc(100% - 57px);}
    </style>
</head>
<body>

    <div class="content-wrapper p-5">
        <div class="card card-info card-outline mx-auto col-md-10 col-lg-6" style="max-width: 760px;">
            <div class="card-header py-5" style='background-color: #fff; border-bottom: 1px solid rgba(0, 0, 0, .125);'>
                <h3 class="text-center">ご回答ありがとうございました。</h3>
            </div>
            <div class="card-body p-4">
                <p>
                    お疲れ様でした。ご回答ありがとうございます。<br>
                    ご回答を確認後、こちらから適性検査と面談についての案内をお送りさせていただきます。<br>
                    今後の案内メールが迷惑メールに振られないよう、【@snapshot.co.jp】のドメイン設定を<br>
                    よろしくお願いいたします。
                </p>
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
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

</body>
</html>

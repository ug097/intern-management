<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="ROBOTS" content="NOINDEX,NOFOLLOW">
        <title>N-aiku ITPro</title>
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
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <p><a href="{{url('/login')}}"><img src="{{asset('img/logo.png')}}" class="w-75"></a></p>
                <p><img src="{{asset('img/company_logo.png')}}" alt="management-logo" class="w-75"></p>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg"></p>
                    @if(session('msg'))
                    <div class="alert alert-danger alert-dismissible">{{session('msg')}}</div>
                    @endif
                    <form action="{{url('login')}}" method="post">
                        {{ csrf_field() }}
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="メールアドレス（ ログインID ）" name="login_id" required="" value='{{old('login_id')}}'>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="パスワード" name="password" required="">                            
                        </div>
<!--                        <p class="mb-1 text-center">
                            <a href="#">パスワードを忘れた方はこちら</a>
                        </p>   -->
                        <div class="row justify-content-center">
                            <!--                            <div class="col-8">
                                                            <div class="icheck-primary">
                                                                <input type="checkbox" id="remember">
                                                                <label for="remember">
                                                                    ログイン状態を維持する
                                                                </label>
                                                            </div>
                                                        </div>-->
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">ログイン</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
<!--                    <hr/>
                    <p class="mb-1 text-center">
                        <a href="#">パスワードを忘れた方はこちら</a>
                    </p>                    -->
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    </body>
</html>

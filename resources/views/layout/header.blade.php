<!DOCTYPE html>
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

        <!-- fullCalendar -->

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css"/>
        <!-- Theme style -->
        <!-- <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}"> -->
        <link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">

        <!-- DropZone -->
        <link rel="stylesheet" href="{{asset('plugins/dropzone/dropzone.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/dropzone/loading03.css')}}">
        
        <!-- FileUploadWithPreview -->
        <link rel="stylesheet" href="{{asset('plugins/file-upload-with-preview/file-upload-with-preview.css')}}">
        <!-- jQuery UI -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
        <!-- select2 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('dist/css/custom_select2.css')}}">
        <!-- TimePicker -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css" crossorigin="anonymous">

        <!-- プレビューボタン用 -->
        <link rel="stylesheet" href="{{asset('dist/css/preview_button.css')}}">
        
        <!-- ロード用 -->
        <link rel="stylesheet" href="{{asset('dist/css/loader.css')}}">
        
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        
        <!-- ローディング用 -->
        <div class="loader-wrap" style="display:none">
            <div class="loader">Loading...</div>
        </div>
        
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand">               
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto nav-pills">                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/logout')}}">
                            <i class="fas fa-sign-out-alt"></i>
                            ログアウト
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->
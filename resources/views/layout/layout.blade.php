@include('layout.header')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!--<h4 class="m-0 text-dark">{{$pagetitle}}</h4>-->
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row mb-4">
                        <div class="col-lg-4">
                            <div class="small-box bg-info" style="margin-bottom:0 !important">
                                <div class="inner">
                                    <div class="row m-2">
                                        <div class="col-lg-8">
                                            <p class="mt-3 mb-3">無料</p>
                                        </div>
                                        <div class="col-lg-2">
                                            <h3 class="m-1">0(仮)<span style="font-size: 1.3rem">社</span></h3>
                                        </div>
                                    </div>
                                    <hr class="m-0 mb-2"style="border-top: 1px solid #fff" noshade>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="small-box bg-success" style="margin-bottom:0 !important">
                                <div class="inner">
                                    <div class="row m-2">
                                        <div class="col-lg-8">
                                            <p class="mt-3 mb-3">エコノミー契約数</p>
                                        </div>
                                        <div class="col-lg-2">
                                            <h3 class="m-1">0(仮)<span style="font-size: 1.3rem">社</span></h3>
                                        </div>
                                    </div>
                                    <hr class="m-0 mb-2"style="border-top: 1px solid #fff" noshade>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="small-box bg-primary" style="margin-bottom:0 !important">
                                <div class="inner">
                                    <div class="row m-2">
                                        <div class="col-lg-8">
                                            <p class="mt-3 mb-3">スタンダード契約数</p>
                                        </div>
                                        <div class="col-lg-2">
                                            <h3 class="m-1">0(仮)<span style="font-size: 1.3rem">社</span></h3>
                                        </div>
                                    </div>
                                    <hr class="m-0 mb-2"style="border-top: 1px solid #fff" noshade>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    @yield('contents')
                </div><!-- /.container-fluid -->
                </section>
            </div>
            @include('layout.menu')
            @include('layout.footer')
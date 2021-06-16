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
                    ユーザー編集
                </div>
            </div>
        </div>
    </div>

            <div class="card card-blue card-outline mx-auto col-md-10 col-lg-6" style="max-width: 800px;">
                <div class="card-header">
                    <div class="row ml-1 mr-1 justify-content-between">
                        <div class="m-2">
                            <i class="fas fa-file-alt mr-1"></i>
                            ユーザー編集
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(count($errors) > 0)
                    <p class="valid-msg text-center font-weight-bold text-danger">入力に問題があります。再入力して下さい。</p>
                    @elseif(session('msg'))
                    <p class="message text-center font-weight-bold text-danger">{{session('msg')}}</p>
                    @endif

                    <form class="" action="{{url('admin/regist')}}" method="post">
                        {{ csrf_field() }}

                        <input type="hidden" name="ss_staff_id" @if($ss_staff) value="{{$ss_staff->id}}" @endif>

                        <div class="form-group text-center">
                            <button type="submit" class="regist-btn btn btn-info mb-3">
                                <i class="fas fa-edit mr-1"></i>保存する
                            </button>
                        </div>

                        <div class="form-group mb-5 ">
                            <label>担当者名</label>
                            <span class="badge badge-danger ml-2">必須</span>
                            <div class="ml-3">
                                <input type="text" class="form-control" name="name"
                                    @isset($ss_staff) value="{{old('name', $ss_staff->name)}}"
                                    @else value="{{old('name')}}" @endisset
                                >
                                @if($errors->has('name'))<p class="valid-msg text-danger">{{$errors->first('name')}}</p>@endif
                            </div>
                        </div>

                        <div class="form-group mb-5 ">
                            <label>メールアドレス</label>
                            <span class="badge badge-danger ml-2">必須</span>
                            <div class="ml-3">
                                <input type="text" class="form-control" name="mail"
                                    @isset($ss_staff) value="{{old('mail', $ss_staff->mail)}}"
                                    @else value="{{old('mail')}}" @endisset
                                >
                                @if($errors->has('mail'))<p class="valid-msg text-danger">{{$errors->first('mail')}}</p>@endif
                            </div>
                        </div>

                        <div class="form-group mb-5 ">
                            <label>パスワード</label>
                            <span class="badge badge-danger ml-2">必須</span>
                            <div class="ml-3">
                                <input type="password" class="form-control" name="password" placeholder="半角英数8字以上">
                                @if($errors->has('password'))<p class="valid-msg text-danger">{{$errors->first('password')}}</p>@endif
                            </div>
                        </div>
                        {{old('role')}}
                        @if(session('login_staff')->role == 0)
                        <div class="form-group mb-5 ">
                            <label>権限</label>
                            <span class="badge badge-danger ml-2">必須</span>
                            <div class="ml-3">
                                <select class="status-edit form-control" name="role">
                                    @if($ss_staff)
                                    <option value="9" @if($ss_staff->role == "9"|| old('role')== "9") selected @endif>スタッフ</option>
                                    <option value="0" @if($ss_staff->role == "0"|| old('role')== "0") selected @endif>管理者</option>
                                    @else
                                    <option value="9" @if((old('role') == "9")) selected @endif>スタッフ</option>
                                    <option value="0" @if((old('role') == "0")) selected @endif>管理者</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        @else
                        <input type="hidden" name="role" value="9">
                        @endif

                        <div class="form-group text-center">
                            <button type="submit" class="regist-btn btn btn-info mt-3">
                                <i class="fas fa-edit mr-1"></i>保存する
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer clearfix">
                    {{-- {{ $ss_staffs->links() }} --}}
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

console.log({{old('role')}});
});
</script>

@endsection
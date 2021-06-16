<div class='row'>
    <div class='col-lg-12'>
        @if($errors->has('pdf_file'))
        <p class="valid-msg text-center font-weight-bold text-danger">{{$errors->first('pdf_file')}}</p>
        @elseif(session('msg'))
        <p class="message text-center font-weight-bold text-danger">{{session('msg')}}</p>
        @endif
        
        <div class="card card-blue card-tabs">
            <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                    <li class="nav-item col-lg-4">
                        <a class="nav-link @if(!session('msg')) active @endif" id="custom-tabs-two-def-tab" data-toggle="pill" href="#custom-tabs-two-def" 
                           role="tab" aria-controls="custom-tabs-two-def">
                            基本情報</a>
                    </li>
                    
                    <li class="nav-item col-lg-4">
                        <a class="nav-link" id="custom-tabs-two-interview-tab" data-toggle="pill" href="#custom-tabs-two-interview" 
                           role="tab" aria-controls="custom-tabs-two-interview">
                            面談情報</a>
                    </li>
                    
                    <li class="nav-item col-lg-4">
                        <a class="nav-link @if(session('msg')) active @endif" id="custom-tabs-two-rirekisyo-tab" data-toggle="pill" href="#custom-tabs-two-rirekisyo" 
                           role="tab" aria-controls="custom-tabs-two-rirekisyo">
                            履歴書／WEBCAB</a>
                    </li>
                   
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                    <div class="tab-pane @if(!session('msg')) active @endif" id="custom-tabs-two-def" role="tabpanel" aria-labelledby="custom-tabs-two-def-tab">
                        <div class="card card-info card-outline">
                            <div class="card-body">
                              <div class="col-lg-12">
                                  <strong>基本情報</strong>
                                  <div class="form-group mt-2">
                                      <div class="row">
                                            <div class="col-lg-6">
                                                <table class="table table-bordered m-0">
                                                    <tr>
                                                        <td class="bg-light" width="160">ID</td>                                                            
                                                        <td>{{$user->id}}</td>                                                            
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">氏名</td>                                                            
                                                        <td>{{$user->fullName}}</td>                                                            
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">氏名(カナ)</td>                                                           
                                                        <td>{{$user->fullNameKana}}</td>                                                            
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">性別</td>
                                                        <td>
                                                            @if($user->gender == 0)
                                                            男性
                                                            @else
                                                            女性
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">郵便番号</td>
                                                        <td>{{$user->zip}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">住所</td>
                                                        <td style="white-space: pre-wrap;">{{$user->address}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">生年月日</td>
                                                        <td>{{date('Y年m月d日', strtotime($user->birthday))}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">電話番号</td>
                                                        <td>{{$user->tel}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">メールアドレス</td>
                                                        <td>{{$user->mail}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-lg-6">
                                                <table class="table table-bordered m-0">                                                       
                                                    <tr>
                                                        <td class="bg-light" width="160">大学名</td>
                                                        <td>
                                                            @if($user->university_id == 999)
                                                            {{$user->university_name}}
                                                            @else
                                                            {{$user->university->name}}
                                                            @endif
                                                        </td>
                                                    </tr>                                                        
                                                    <tr>
                                                        <td class="bg-light">学部名</td>
                                                        <td>
                                                            @if($user->undergraduate_id == 99)
                                                            {{$user->undergraduate_name}}
                                                            @else
                                                            {{$user->undergraduate->name}}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">大学入学年度</td>
                                                        <td>{{$user->admission_year}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">大学卒業年度</td>
                                                        <td>{{$user->graduation_year}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">大学院名</td>
                                                        <td>
                                                            @isset($user->grad_school_id)
                                                            @if($user->grad_school_id == 99)
                                                            {{$user->grad_school_name}}
                                                            @else
                                                            {{$user->grad_school->name}}
                                                            @endif
                                                            @endisset
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">研究室</td>
                                                        <td>{{$user->seminar_etc}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">大学院入学年度</td>
                                                        <td>{{$user->grad_admission_year}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">大学院卒業年度</td>
                                                        <td>{{$user->grad_graduation_year}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                  <div class="form-group mb-5">
                                      <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-bordered m-0">
                                                    <tr>
                                                        <td class="bg-light" width="160">研究内容</td>
                                                        <td>{{$user->research_content}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">資格・スキル</td>
                                                        <td style="white-space: pre-wrap;">{{$user->skill}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">部活・サークル・団体等</td>
                                                        <td style="white-space: pre-wrap;">{{$user->club_etc}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div> 

                                    <strong>インターン情報</strong>
                                    <div class="form-group mt-2 mb-5">
                                        <div class="row">
                                              <div class="col-lg-12">
                                                  <table class="table table-bordered m-0">
                                                      <tr>
                                                          <td class="bg-light" width="160">N-aikuを知ったきっかけ</td>
                                                          <td>{{$user->opportunity_to_know}}</td>
                                                      </tr>

                                                      <tr>
                                                          <td class="bg-light">インターンで成長させたい力</td>
                                                          <td style="white-space: pre-wrap;">{{$user->improve_ability}}</td>
                                                      </tr>
                                                      
                                                      <tr>
                                                          <td class="bg-light">過去に参加したインターン</td>
                                                          <td style="white-space: pre-wrap;">{{$user->experienced_company}}</td>
                                                      </tr>
                                                      
                                                      <tr>
                                                          <td class="bg-light">インターンで希望する職種</td>
                                                          <td>{{$user->occupation_lg->name}}</td>
                                                      </tr>
                                                      
                                                  </table>
                                              </div>
                                          </div>
                                      </div> 

                                      <strong>自分について</strong>
                                      <div class="form-group mt-2">
                                        <div class="row">
                                              <div class="col-lg-12">
                                                  <table class="table table-bordered m-0">
                                                      <tr>
                                                          <td class="bg-light" width="160">今の自分を採点するとしたら</td>
                                                          <td>{{$user->self_score}} 点</td>
                                                      </tr>
                                                      <tr>
                                                          <td class="bg-light">点数の理由</td>
                                                          <td style="white-space: pre-wrap;">{{$user->score_reason}}</td>
                                                      </tr>
                                                      <tr>
                                                          <td class="bg-light">理想に近づくため必要なこと</td>
                                                          <td style="white-space: pre-wrap;">{{$user->necessary}}</td>
                                                      </tr>
                                                  </table>
                                              </div>
                                          </div>
                                      </div> 
                               </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane" id="custom-tabs-two-interview" role="tabpanel" aria-labelledby="custom-tabs-two-interview-tab">

                        <div class="card card-info  card-outline">
                            <div class="card-header" style='background-color: #fff; border-bottom: 1px solid rgba(0, 0, 0, .125);'>
                                <div class="form-row">
                                    <div class="form-group col-lg-8">
                                        <div style="color: black">
                                            <i class="nav-icon fas fa-comments"></i>
                                                面談登録
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <div style="color: black; text-align: right">
                                            <span sytle="margin-left:50px"></span>
                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="message" style="color:red"></p>
                                
                                <form class="interview_form" action="" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="user_id" value="{{$user->id}}">

                                    <div class="form-group text-center">
                                        <button type="button" class="regist-btn btn btn-info mb-3">
                                            <i class="fas fa-edit mr-1"></i>保存する
                                        </button>
                                    </div>

                                    <div class="form-group">
                                        <label for="current_self">現在の自分はどんな自分か？</label>
                                        <p class="font-italic small ml-3">現在の状況、その理由や原因</p>
                                        <textarea id="current_self" name="current_self" rows="4" class="form-control"
                                        >@isset($user->interview_content->current_self){{$user->interview_content->current_self}}@endisset</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="five_years_later">5年後、自分はどうありたいか？</label>
                                        <textarea id="five_years_later" name="five_years_later" rows="4" class="form-control"
                                        >@isset($user->interview_content->five_years_later){{$user->interview_content->five_years_later}}@endisset</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="improvement">上記の理想に近づくためには現状をどう変えていけばよいか？</label>
                                        <p class="font-italic small ml-3">身近な小さな目標でも、インターンを通じて得るような目標でも可</p>
                                        <textarea id="improvement" name="improvement" rows="4" class="form-control"
                                        >@isset($user->interview_content->improvement){{$user->interview_content->improvement}}@endisset</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="after_intern">インターン後どうなっていたいか？</label>
                                        <textarea id="after_intern" name="after_intern" rows="4" class="form-control"
                                        >@isset($user->interview_content->after_intern){{$user->interview_content->after_intern}}@endisset</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="intern_aspiration">インターンでやりたいことはどんなことか？</label>
                                        <p class="font-italic small ml-3">やりたい職種や、得たいスキル</p>
                                        <textarea id="intern_aspiration" name="intern_aspiration" rows="4" class="form-control"
                                        >@isset($user->interview_content->intern_aspiration){{$user->interview_content->intern_aspiration}}@endisset</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="strengths_affect">自分自身の強みがどのようにインターン先に影響すると思うか？</label>
                                        <p class="font-italic small ml-3">強みが最大限発揮された時に生まれる価値</p>
                                        <textarea id="strengths_affect" name="strengths_affect" rows="4" class="form-control"
                                        >@isset($user->interview_content->strengths_affect){{$user->interview_content->strengths_affect}}@endisset</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="intern_condition">インターン先の条件または希望はあるか？</label>
                                        <p class="font-italic small ml-3">時間、場所など</p>
                                        <textarea id="intern_condition" name="intern_condition" rows="4" class="form-control"
                                        >@isset($user->interview_content->intern_condition){{$user->interview_content->intern_condition}}@endisset</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="free_description1">自由記入欄①</label>
                                        <textarea id="free_description1" name="free_description1" rows="4" class="form-control"
                                        >@isset($user->interview_content->free_description1){{$user->interview_content->free_description1}}@endisset</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="free_description2">自由記入欄②</label>
                                        <textarea id="free_description2" name="free_description2" rows="4" class="form-control"
                                        >@isset($user->interview_content->free_description2){{$user->interview_content->free_description2}}@endisset</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="free_description3">自由記入欄③</label>
                                        <textarea id="free_description3" name="free_description3" rows="4" class="form-control"
                                        >@isset($user->interview_content->free_description3){{$user->interview_content->free_description3}}@endisset</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="appeal_point">面談者からの一言</label>
                                        <textarea id="appeal_point" name="appeal_point" rows="4" class="form-control"
                                        >@isset($user->interview_content->appeal_point){{$user->interview_content->appeal_point}}@endisset</textarea>
                                    </div>

                                    <div class="form-group text-center">
                                        <button type="button" class="regist-btn btn btn-info mt-3">
                                            <i class="fas fa-edit mr-1"></i>保存する
                                        </button>
                                    </div>
                                </form>
                            </div> 
                            <div class="messagecard-block"></div>
                        </div>
                    </div>
                    
                    <div class="tab-pane @if(session('msg')) active @endif" id="custom-tabs-two-rirekisyo" role="tabpanel" aria-labelledby="custom-tabs-two-rirekisyo-tab">

                        <div class="card card-info  card-outline mx-auto">
                            <div class="card-header" style='background-color: #fff; border-bottom: 1px solid rgba(0, 0, 0, .125);'>
                                <div class="form-row">
                                    <div class="form-group">
                                        <div style="color: black">
                                            <i class="fas fa-file-alt mr-1"></i>
                                            PDFファイル管理
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body d-flex justify-content-center">
                                    <a type="button" href="{{url('pdf/user/').'/'.$user->id}}" class="btn btn-primary" target="_blank">
                                        履歴書PDF出力
                                    </a>
                                    <button type="button" class="btn btn-success mx-5" data-toggle="modal" data-target="#upload-modal">
                                        WEBCABアップロード
                                    </button>
                                    @isset($user->webcab_data->pdf_url)
                                    <a type="button"  href="{{url('pdf/webcab_show?url=').$user->webcab_data->pdf_url}}" target="_blank" class="btn btn-info text-white">
                                        WEBCABダウンロード
                                    </a>
                                    @endisset
                                </div>

                              <div class="modal fade" id="upload-modal" tabindex="-1"
                                    role="dialog" aria-labelledby="label1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                        <form method="POST" action="{{url('pdf/upload/').'/'.$user->id}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="label1">WEBCAB PDFファイルアップロード</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="file" name="pdf_file" class="form-control-file" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                                <button type="submit" class="btn btn-primary">アップロード</button>
                                            </div>
                                        </form>
                                  </div>
                                </div>
                              </div>

                            <div class="messagecard-block"></div>
                        </div>
                    </div>
                    
                </div>
            <!-- /.card -->
            </div>     
        </div>  

    </div>
</div>

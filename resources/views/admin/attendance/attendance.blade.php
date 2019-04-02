<div class="row">
                    <div class="col-sm-12">
                        
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.daily_attend')</h4>
                            <h6 class="card-subtitle">@lang('admin.take_attend')</h6>
<form class="" action="{{url('')}}/add/attendance/create" method="post">
     {{ csrf_field() }}
    <div class="row">
       <div  class="col-sm-3">
                             <div id="studentpage" class="form-group">
            <label for="example-email">@lang('admin.student') * (1)<span class="help"></span></label>
    <select id="classdetail" required name="student" class="form-control select2">
      <option></option>
      @foreach(\App\Student::where('class',$id)->get() as $student)
      <option value="{{$student->id}}">{{$student->gname}} {{$student->fname}}</option>
      @endforeach
            </select>
                                </div>
                              </div>
                              <div  class="col-sm-3">
                             <div id="studentpage" class="form-group">
            <label for="example-email">@lang('admin.type') * (2)<span class="help"></span></label>
            <select id="classdetail" required name="type" class="form-control select2">
            <option value="1">@lang('admin.school_active')</option>
            <option value="2">@lang('admin.sport_active')</option>
            <option value="3">@lang('admin.other_active')</option>
            </select>
                                </div>
                              </div>
                    <div class="col-sm-3">
                             <div class="form-group">
            <label for="example-email">@lang('admin.date') * (3)<span class="help"></span></label>
          <input type="date" id="mdate" value="{{\Carbon\Carbon::today()}}" class="form-control" name="date">
                                </div>
                              </div>
                              <div class="col-sm-3">
                             <div class="form-group">
  <label for="example-email">@lang('admin.select_status') * (4)<span class="help"></span></label>
          <select class="form-control" name="status">
            <option value="">@lang('admin.select_status')</option>
            <option value="1">@lang('admin.present')</option>
            <option value="0">@lang('admin.absent')</option>
          </select>
                                </div>
                              </div>
                              <div class="col-sm-3">
                             <div class="form-group">
  <label for="example-email">@lang('admin.choose_resp')* (5)<span class="help">@lang('admin.skip_absent')</span></label>
          <select class="form-control" name="response">
            <option value="">@lang('admin.not_apply')</option>
            <option value="1">@lang('admin.punctual')</option>
            <option value="0">@lang('admin.late')</option>
          </select>
                                </div>
                              </div>
                          <div class="col-sm-3">
                             <div class="form-group">
            <label for="example-email">@lang('admin.term') * (6)<span class="help"></span></label>
           <input type="text" class="form-control" readonly value="{{\App\Session::latest()->first()->terms}}" name="term">
                                </div>
                              </div>
                              <div class="col-sm-3">
                             <div class="form-group">
        <label for="example-email">@lang('admin.session') * (7)<span class="help"></span></label>
            <input type="text" class="form-control" readonly value="{{\App\Session::latest()->first()->session}}" name="session">
                                </div>
                              </div>
                              
                               <div class="col-sm-3">
                             <div class="form-group">
  <label for="example-email">@lang('admin.reason_opt') (8)<span class="help"></span></label>
         <textarea class="form-control" name="reason"></textarea>
                                </div>
                              </div>
             </div>
              <input type="hidden" value="{{$id}}" name="class">            
             <div class="row">
         <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                 <div class="form-group">
                <input type="submit" required class="form-control btn btn-primary" value="@lang('admin.submit')">
                    </div>  
                </div>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
    <script type="text/javascript">
         $('#mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
         $('.select2').select2();
    </script>
<form class="formsubmittin" method="post" action="{{url('')}}/admin/comment/create/{{$id}}">
              {{ csrf_field() }}
             <div class="row">
             <div  class="col-md-6">
                 <div class="form-group">
                    <label>@lang('admin.cl_facili_rem')</label>
@if(count(\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->get())>0)
<textarea class="form-control" name="fcomment" placeholder="@lang('admin.cl_facili_rem')">{{\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->latest()->first()->fcomment}}</textarea> 
@else
<textarea class="form-control" name="fcomment" placeholder="@lang('admin.cl_facili_rem')"></textarea>
@endif

                 </div>
             </div>
            <div  class="col-md-6">
                 <div class="form-group">
            <label>@lang('admin.date')</label>
        <input type="date" name="fdate" class="form-control mdate" > 
                 </div>
             </div>
             <div  class="col-md-6">
                 <div class="form-group">
                    <label>@lang('admin.head_facili_rem')</label>
@if(count(\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->get())>0)
<textarea class="form-control" name="hcomment" placeholder="@lang('admin.head_facili_rem')">{{\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->latest()->first()->hcomment}}</textarea>
@else
<textarea class="form-control" name="hcomment" placeholder="@lang('admin.head_facili_rem')"></textarea>
@endif

                 </div>
             </div>
              <div  class="col-md-6">
                 <div class="form-group">
                    <label>@lang('admin.date')</label>
              <input type="date" name="hdate" class="form-control mdate"> 
                 </div>
             </div>
              <div  class="col-md-6">
                 <div class="form-group">
                    <label>@lang('admin.promotion') @lang('admin.status')</label>
@if(count(\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->get())>0)
@if(\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->latest()->first()->promotion=='1')
<input type="text" readonly value="@lang('admin.promote')" name="">
@elseif(\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->latest()->first()->promotion=='0')
<input type="text" readonly value="@lang('admin.pass_term')" name="">
@elseif(\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->latest()->first()->promotion=='2')
<input type="text" readonly value="@lang('admin.demote')" name="">
@endif
@else
<select class="form-control" required name="promotion">
         <option value="">@lang('admin.select') @lang('admin.student') @lang('admin.status')</option> 
         <option value="1">@lang('admin.promote') @lang('admin.student')</option>  
         <option value="0">@lang('admin.pass_term')</option>
         <option value="2">@lang('admin.demote')</option>
        </select>
        @endif
                 </div>
             </div>
              <div  class="col-md-6">
                 <div class="form-group">
                    <label>Next Term Begins</label>
@if(count(\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->get())>0)
<input type="text" value="{{\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->latest()->first()->termb}}" name="termb">
@else
<input type="date" name="termb" required class="form-control mdate">
@endif 
                 </div>
             </div>
         </div>
                                        <div class="row">
                                      <div class="col-md-6">
                                      </div>
                                     <div class="col-md-6">
                                                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-bg btn-primary btn-block" name="">
                                                </div>
                                </div>
                            </div>
                                        </form>
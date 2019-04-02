<hr>
                        <h4 class="card-title">@lang('admin.comment_status')</h4>
                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
    <div id="showcontent">
    <form class="formsubmittin" method="post" action="{{url('')}}/admin/comment/create/{{$id}}">
              {{ csrf_field() }}
             <div class="row">
  @if(\App\Resultsetting::first()->sattend=='1')
               <table class="table table-bordered">
<tbody>
     <tr>
        <td style="text-align: center;font-size:12px;" colspan="4">{{\App\Resultphrase::first()->attend}}</td>
    </tr>
    <tr>
       <td style="text-align: center;font-size:12px;"><small></small></td>
        <td style="text-align: center;font-size:12px;"><small><b>{{\App\Resultphrase::first()->school}}</b></small></td>
         <td  style="text-align: center;font-size:12px;"><small><b>{{\App\Resultphrase::first()->sport}}</b></small></td>
           <td style="text-align: center;font-size:12px;"><small><b>{{\App\Resultphrase::first()->other}}</b></small></td>
    </tr>
     @if(count(\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())>0)
 <tr>
      <td style="text-align: center;font-size:12px;"><small><b>{{\App\Resultphrase::first()->time_open}}</b></small></td>
        <td style="text-align: center;font-size:10px;"><small>
          <input type="number" value="{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->school_open}}" class="form-control sch_total" name="school_open"></small></td> 
        <td style="text-align: center;font-size:10px;"><small><input type="number" value="{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->sport_open}}" class="form-control sp_total" name="sport_open"></small></td>
        <td style="text-align: center;font-size:10px;"><small><input type="number" value="{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->other_open}}" class="form-control oth_total" name="other_open"></small></td>

    </tr>
     <tr>
      <td style="text-align: center;font-size:12px;"><small><b>{{\App\Resultphrase::first()->time_present}}</b></small></td>
        <td style="text-align: center;font-size:10px;"><small><input type="number"  value="{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->school_present}}" class="form-control sch_pre" name="school_present"></small></td> 
        <td style="text-align: center;font-size:10px;"><small><input type="number"  value="{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->sport_present}}" class="form-control sp_pre" name="sport_present"></small></td>
        <td style="text-align: center;font-size:10px;"><small><input type="number" value="{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->other_present}}" class="form-control oth_pre" name="other_present"></small></td>
    </tr>
     <tr>
      <td style="text-align: center;font-size:12px;"><small><b>{{\App\Resultphrase::first()->time_punctual}}</b></small></td>
        <td style="text-align: center;font-size:10px;"><small><input type="number"  value="{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->school_punctual}}"  class="form-control sch_pun" name="school_punctual"></small></td> 
        <td style="text-align: center;font-size:10px;"><small><input type="number"  value="{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->sport_punctual}}" class="form-control sp_pun" name="sport_punctual"></small></td>
        <td style="text-align: center;font-size:10px;"><small><input type="number"  value="{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->other_punctual}}" class="form-control oth_pun" name="other_punctual"></small></td>
    </tr>
     <tr>
      <td style="text-align: center;font-size:12px;"><small><b>{{\App\Resultphrase::first()->time_late}}</b></small></td>
        <td style="text-align: center;font-size:10px;"><small><input type="number"  value="{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->school_late}}" value="" class="form-control sch_late" name="school_late"></small></td> 
        <td style="text-align: center;font-size:10px;"><small><input type="number"  value="{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->sport_late}}" class="form-control sp_late" name="sport_late"></small></td>
        <td style="text-align: center;font-size:10px;"><small><input type="number" value="{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->other_late}}" class="form-control oth_late" name="other_late"></small></td>
    </tr>
     <tr>
      <td style="text-align: center;font-size:12px;"><small><b>{{\App\Resultphrase::first()->time_absent}}</b></small></td>
        <td style="text-align: center;font-size:10px;"><small><input type="number" value="{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->school_absent}}" class="form-control sch_ab" name="school_absent"></small></td> 
        <td style="text-align: center;font-size:10px;"><small><input type="number" value="{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->sport_absent}}" class="form-control sp_ab" name="sport_absent"></small></td>
        <td style="text-align: center;font-size:10px;"><small><input type="number" value="{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->other_absent}}" class="form-control oth_ab" name="other_absent"></small></td>
    </tr>

       @elseif(count(\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())==0)
     <tr>
      <td style="text-align: center;font-size:12px;"><small><b>{{\App\Resultphrase::first()->time_open}}</b></small></td>
        <td style="text-align: center;font-size:10px;"><small>
          <input type="number" value="{{count(\App\Attendance::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('type','1')->get())}}" class="form-control sch_total" name="school_open"></small></td> 
        <td style="text-align: center;font-size:10px;"><small><input type="number" value="{{count(\App\Attendance::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('type','2')->get())}}" class="form-control sp_total" name="sport_open"></small></td>
        <td style="text-align: center;font-size:10px;"><small><input type="number" value="{{count(\App\Attendance::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('type','3')->get())}}" class="form-control oth_total" name="other_open"></small></td>

    </tr>
     <tr>
      <td style="text-align: center;font-size:12px;"><small><b>{{\App\Resultphrase::first()->time_present}}</b></small></td>
        <td style="text-align: center;font-size:10px;"><small><input type="number"  value="{{count(\App\Attendance::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('type','1')->where('status','1')->get())}}" class="form-control sch_pre" name="school_present"></small></td> 
        <td style="text-align: center;font-size:10px;"><small><input type="number"  value="{{count(\App\Attendance::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('status','1')->where('type','2')->get())}}" class="form-control sp_pre" name="sport_present"></small></td>
        <td style="text-align: center;font-size:10px;"><small><input type="number" value="{{count(\App\Attendance::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('status','1')->where('type','3')->get())}}" class="form-control oth_pre" name="other_present"></small></td>
    </tr>
     <tr>
      <td style="text-align: center;font-size:12px;"><small><b>{{\App\Resultphrase::first()->time_punctual}}</b></small></td>
        <td style="text-align: center;font-size:10px;"><small><input type="number"  value="{{count(\App\Attendance::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('type','1')->where('response','1')->where('status','1')->get())}}"  class="form-control sch_pun" name="school_punctual"></small></td> 
        <td style="text-align: center;font-size:10px;"><small><input type="number"  value="{{count(\App\Attendance::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('type','2')->where('response','1')->where('status','1')->get())}}" class="form-control sp_pun" name="sport_punctual"></small></td>
        <td style="text-align: center;font-size:10px;"><small><input type="number"  value="{{count(\App\Attendance::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('type','3')->where('response','1')->where('status','1')->get())}}" class="form-control oth_pun" name="other_punctual"></small></td>
    </tr>
     <tr>
      <td style="text-align: center;font-size:12px;"><small><b>{{\App\Resultphrase::first()->time_late}}</b></small></td>
        <td style="text-align: center;font-size:10px;"><small><input type="number"  value="{{count(\App\Attendance::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('type','1')->where('response','0')->where('status','1')->get())}}" value="" class="form-control sch_late" name="school_late"></small></td> 
        <td style="text-align: center;font-size:10px;"><small><input type="number"  value="{{count(\App\Attendance::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('type','2')->where('response','0')->where('status','1')->get())}}" class="form-control sp_late" name="sport_late"></small></td>
        <td style="text-align: center;font-size:10px;"><small><input type="number" value="{{count(\App\Attendance::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('type','3')->where('response','0')->where('status','1')->get())}}" class="form-control oth_late" name="other_late"></small></td>
    </tr>
     <tr>
      <td style="text-align: center;font-size:12px;"><small><b>{{\App\Resultphrase::first()->time_absent}}</b></small></td>
        <td style="text-align: center;font-size:10px;"><small><input type="number" value="{{count(\App\Attendance::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('type','1')->where('status','1')->get())}}" class="form-control sch_ab" name="school_absent"></small></td> 
        <td style="text-align: center;font-size:10px;"><small><input type="number" value="{{count(\App\Attendance::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('type','2')->where('status','1')->get())}}" class="form-control sp_ab" name="sport_absent"></small></td>
        <td style="text-align: center;font-size:10px;"><small><input type="number" value="{{count(\App\Attendance::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('type','3')->where('status','1')->get())}}" class="form-control oth_ab" name="other_absent"></small></td>
    </tr>
    @endif
</tbody>
</table>
@endif
              <div  class="col-md-4">
                 <div class="form-group">
                    <label>{{\App\Student::find($id)->gname}}'s Promotion Status <small><em>skip if not promotiom term</em></small></label>
   <select class="form-control" required name="promotion">
         <option value=""></option>
         <option value="0">@lang('admin.remain_class')</option> 
         @foreach(\App\Course::all() as $class)
         <option value="{{$class->id}}">{{$class->title}}</option>
         @endforeach
     </select>
    </div>
</div>

 <div  class="col-md-4">
                 <div class="form-group">
                    <label>{{\App\Resultphrase::first()->term_begin}}</label>
@if(count(\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->get())>0)
<input type="text" class="form-control" value="{{\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->latest()->first()->termb}}" name="termb">
@else
<input type="date" name="termb" required class="form-control mdate">
@endif 
                 </div>
             </div>
             <div  class="col-md-4">
                 <div class="form-group">
                    <label>{{\App\Resultphrase::first()->class_fac}}</label>
@if(count(\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->get())>0)
<textarea class="form-control" name="fcomment" placeholder="Class Facilitator's Comment">{{\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->latest()->first()->fcomment}}</textarea> 
@else
<textarea class="form-control" name="fcomment" placeholder="Class Facilitator's Comment"></textarea>
@endif

                 </div>
             </div>
            <div  class="col-md-4">
                 <div class="form-group">
            <label>{{\App\Resultphrase::first()->class_fac}} {{\App\Resultphrase::first()->date}} {{\App\Resultphrase::first()->signature}}</label>
@if(count(\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->get())>0)
<input type="text" readonly name="fdate" value="{{\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->latest()->first()->fdate}}" class="form-control mdate" > 
@else
        <input type="date" name="fdate" class="form-control mdate" > 
@endif
                 </div>
             </div>
             <div  class="col-md-4">
                 <div class="form-group">
                    <label>{{\App\Resultphrase::first()->head_rem}}</label>
@if(count(\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->get())>0)
<textarea class="form-control" name="hcomment" placeholder="Class Facilitator's Comment">{{\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->latest()->first()->hcomment}}</textarea>
@else
<textarea class="form-control" name="hcomment" placeholder="Class Facilitator's Comment"></textarea>
@endif

                 </div>
             </div>
              <div  class="col-md-4">
                 <div class="form-group">
                    <label>{{\App\Resultphrase::first()->head_rem}} {{\App\Resultphrase::first()->date}} {{\App\Resultphrase::first()->signature}}</label>
@if(count(\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->get())>0)
<input type="text" readonly name="hdate" value="{{\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->latest()->first()->hdate}}" class="form-control mdate" > 
@else
              <input type="date" name="hdate" class="form-control mdate"> 
@endif
                 </div>
             </div>
         </div>
                                        <div class="row">
                                      <div class="col-md-6">
                                      </div>
                                     <div class="col-md-6">
                                                <div class="form-group">
                    <input type="submit" value="@lang('admin.submit')" class="btn btn-bg btn-primary btn-block" name="">
                                                </div>
                                </div>
                            </div>
                                        </form>
                                    </div>
                                        </div>
                                  </div>
                                  <script type="text/javascript">
    $(".formsubmittin").submit(function(e) {
  var formDatan = new FormData(this);
   jQuery('#showresults').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:50px;" /></div>');
    $form = $(this);
  $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
        swal("@lang('admin.saved_info')", "@lang('admin.continue-button')", "success");
        jQuery('#showcontent').html(data);
        jQuery('#showresults').hide();
      },
      error:function(data){
         alert(data);
      },
       cache: false,
        contentType: false,
        processData: false
 });
   e.preventDefault();
});
          $(document).ready(function() {
                  $('.mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
              });
          $(document).ready(function() {
    setInterval(function(){ preab();punlate(); }, 1000);
  });
  function preab(){
  var sch_absent= $('.sch_total').val()-$('.sch_pre').val();
  var sp_absent= $('.sp_total').val()-$('.sp_pre').val();
   var oth_absent= $('.oth_total').val()-$('.oth_pre').val();
   $('.sch_ab').val(sch_absent);$('.sp_ab').val(sp_absent);$('.oth_ab').val(oth_absent);
  }
   function punlate(){
  var sch_late= $('.sch_pre').val()-$('.sch_pun').val();
  var sp_late= $('.sp_pre').val()-$('.sp_pun').val();
   var oth_late= $('.oth_pre').val()-$('.oth_pun').val();
   $('.sch_late').val(sch_late);$('.sp_late').val(sp_late);$('.oth_late').val(oth_late);
  }
</script>
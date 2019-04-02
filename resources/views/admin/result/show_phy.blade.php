 <form class="formsubmitted" method="post" action="{{url('')}}/admin/physical/create/{{$id}}">
              {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="heightb">{{\App\Resultphrase::first()->height}} ({{\App\Resultphrase::first()->beg_term}})Ft :</label>
@if(count(\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())>0)
<input type="number" class="form-control" value="{{\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->heightb}}" name="heightb" id="heightb">
@else
<input type="number" class="form-control" name="heightb" id="heightb">
@endif
                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="heighte">{{\App\Resultphrase::first()->height}} ({{\App\Resultphrase::first()->end_term}})Ft :</label>
@if(count(\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())>0)
<input type="number" class="form-control" value="{{\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->heighte}}" name="heighte" id="heighte">
@else
<input type="number" class="form-control" name="heighte" id="heighte">
@endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="weightb">{{\App\Resultphrase::first()->weight}} ({{\App\Resultphrase::first()->beg_term}})Kg :</label>
@if(count(\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())>0)
<input type="number" class="form-control" value="{{\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->weightb}}" name="weightb" id="weightb">
@else
<input type="number" class="form-control" name="weightb" id="weightb">
@endif
                                            </div>
                                        </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                   <label for="weightb">{{\App\Resultphrase::first()->weight}} ({{\App\Resultphrase::first()->end_term}})Kg :</label>
@if(count(\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())>0)
<input type="number" class="form-control" value="{{\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->weighte}}" name="weighte" id="weighte">
@else
<input type="number" class="form-control" name="weighte" id="weighte">
@endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                            <div class="form-group">
                                                    <label for="facilitator">{{\App\Resultphrase::first()->fac_rem}}:</label>
@if(count(\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())>0)
<textarea class="form-control" name="facilitator" id="facilitator">{{\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->facilitator}}</textarea>
@else
<textarea class="form-control" name="facilitator" id="facilitator"></textarea>
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
 <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
             <script type="text/javascript">
    $(".formsubmitted").submit(function(e) {
  var formDatan = new FormData(this);
   jQuery('#showresults').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:50px;" /></div>');
    $form = $(this);
  $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
       swal("@lang('admin.saved_info')", "@lang('admin.continue-button')", "success");
        jQuery('#showresultsd').html(data);
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
</script>
<form class="formsubmit" method="post" action="{{url('')}}/admin/behave/create/{{$id}}">
              {{ csrf_field() }}
                                        <div class="row">
@if(count(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())>0)
@foreach(\App\Behavioural::where('class_id',\App\Student::find($id)->class)->get() as $behave)
                                            <div class="col-md-6">
                                                <div class="form-group">
                     <label for="firstName1">{{$behave->name}} :</label>
                                <select class="form-control" required id="behave{{$loop->iteration}}" name="behave{{$loop->iteration}}">
@if(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='5')
 <option value="5">{{\App\Resultphrase::first()->excellent}}</option>
                <option  value="4">{{\App\Resultphrase::first()->high_degree}}</option>
            <option value="3">{{\App\Resultphrase::first()->accept_level}}</option>
                <option value="2">{{\App\Resultphrase::first()->poor_level}}</option>
        <option value="1">{{\App\Resultphrase::first()->indifferent}}</option>
@elseif(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='4')
<option value="4">High Degree</option>
 <option value="5">{{\App\Resultphrase::first()->excellent}}</option>
            <option value="3">{{\App\Resultphrase::first()->accept_level}}</option>
                <option value="2">{{\App\Resultphrase::first()->poor_level}}</option>
        <option value="1">{{\App\Resultphrase::first()->indifferent}}</option>
@elseif(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='3')
<option value="3">Acceptance Level</option>
 <option value="5">{{\App\Resultphrase::first()->excellent}}</option>
                <option  value="4">{{\App\Resultphrase::first()->high_degree}}</option>
                <option value="2">{{\App\Resultphrase::first()->poor_level}}</option>
        <option value="1">{{\App\Resultphrase::first()->indifferent}}</option>
@elseif(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='2')
<option value="2">Poor Level</option>
 <option value="5">{{\App\Resultphrase::first()->excellent}}</option>
                <option  value="4">{{\App\Resultphrase::first()->high_degree}}</option>
            <option value="3">{{\App\Resultphrase::first()->accept_level}}</option>
        <option value="1">{{\App\Resultphrase::first()->indifferent}}</option>
@elseif(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='1')
<option value="1">Insufficient</option>
 <option value="5">{{\App\Resultphrase::first()->excellent}}</option>
                <option  value="4">{{\App\Resultphrase::first()->high_degree}}</option>
            <option value="3">{{\App\Resultphrase::first()->accept_level}}</option>
                <option value="2">{{\App\Resultphrase::first()->poor_level}}</option>
@endif
               
                                </select>
                                            </div>
                                        </div>
                                            @endforeach
@else
@foreach(\App\Behavioural::where('class_id',\App\Student::find($id)->class)->get() as $behave)
                                            <div class="col-md-6">
                                                <div class="form-group">
                     <label for="firstName1">{{$behave->name}} :</label>
                                <select class="form-control" required id="behave{{$loop->iteration}}" name="behave{{$loop->iteration}}">
                                   <option value="">@lang('admin.select') @lang('admin.one')</option>
              <option value="5">{{\App\Resultphrase::first()->excellent}}</option>
                <option  value="4">{{\App\Resultphrase::first()->high_degree}}</option>
            <option value="3">{{\App\Resultphrase::first()->accept_level}}</option>
                <option value="2">{{\App\Resultphrase::first()->poor_level}}</option>
        <option value="1">{{\App\Resultphrase::first()->indifferent}}</option>
                                </select>
                                            </div>
                                        </div>
                                            @endforeach
@endif
                                        </div>
                                <div class="row">
                                      <div class="col-md-6">
                                      </div>
                                     <div class="col-md-6">
                                                <div class="form-group">
                    <input type="submit" value="@lang('admin.submit')" class="btn btn-bg btn-primary btn-block" name="">
                                                </div>
                                </div>
            </form>
             <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
             <script type="text/javascript">
    $(".formsubmit").submit(function(e) {
  var formDatan = new FormData(this);
   jQuery('#showresults').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:50px;" /></div>');
    $form = $(this);
  $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
        swal("@lang('admin.save_info')", "@lang('admin.continue-button')", "success");
        jQuery('#showresultshere').html(data);
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
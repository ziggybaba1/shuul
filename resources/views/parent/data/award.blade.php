<div class="row">
                    <div class="col-md-12">
 <div class="card">
        <div class="card-body">
                 <!-- .col -->
@forelse(\App\Award::where('user_id',\App\Student::findOrFail($id)->id)->where('status','0')->get() as $stud)
                    <div class="col-md-4 col-lg-4 col-xlg-4">
                        <div class="ribbon-wrapper-reverse card card-body">
            <div class="ribbon ribbon-bookmark ribbon-vertical-r ribbon-success"><i class="fa fa-trophy"></i></div>
             <div class="ribbon ribbon-corner ribbon-info"><i class="fa fa-trophy"></i></div>
                            <div class="row">

                                <div class="col-md-4 col-lg-3 text-center">
                <a >
                @if(\App\Student::find(\App\Award::find($stud->id)->user_id)->image!='')
                    <img src="{{url('')}}/uploads/avatars/{{\App\Student::find(\App\Award::find($stud->id)->user_id)->image}}" alt="user" class="img-circle img-responsive">
                @else
                 <img src="{{url('')}}/assets/images/user.png" alt="user" class="img-circle img-responsive">
                 @endif
            </a>
                                </div>
                                <div class="col-md-8 col-lg-9">

                                    <h3 class="box-title m-b-0">{{\App\Student::find(\App\Award::find($stud->id)->user_id)->gname}} {{\App\Student::find(\App\Award::find($stud->id)->user_id)->fname}}</h3> <small>{{$stud->user_id}}</small>
                                    <address>
                                        <br/>
                                        <br/>
                             <div class="row">
                            <center>
                <a href="javascript:void(0)" onclick="showAjaxModal('{{url('')}}/show/award/{{$stud->id}}')"><i class="fa fa-2x fa-trophy"></i></a><br>
                                      <small style="font-size: 12px;">{{ str_limit($stud->name, $limit = 10, $end = '...') }}</small>
                                  </center>
                                  <label>&nbsp; &nbsp;</label>
                                  </div>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
        @empty
        <tr><td colspan="6">@lang('parent.no-entry')</td></tr>
                    <!-- /.col -->
@endforelse
                    </div>  
                </div>
            </div>
        </div>
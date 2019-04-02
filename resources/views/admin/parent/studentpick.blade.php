<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            	<h4 class="card-title">{{\App\Student::find($id)->gname}} {{\App\Student::find($id)->fname}} @lang('admin.pickup') @lang('admin.form')</h4>
                            <h6 class="card-subtitle">
                                {{\Carbon\Carbon::today()->toFormattedDateString()}}</h6>
                    <div class="row">
    @foreach(\App\Relation::where('student_id',$id)->where('status','0')->get() as $parent)
                    <div class="col-md-6 col-lg-6 col-xlg-6">
                        <div class="ribbon-wrapper-reverse card card-body">
            <div class="ribbon ribbon-bookmark ribbon-vertical-r ribbon-success"><i class="fa fa-user"></i></div>
             <div class="ribbon ribbon-corner ribbon-info"><i class="fa fa-user"></i></div>
                            <div class="row">

                                <div class="col-md-4 col-lg-3 text-center">
            
    @if(\App\Parenting::find($parent->parent_id)->image!='')       
    <img style="width: 85px;" src="{{url('')}}/uploads/avatars/{{\App\Parenting::find($parent->parent_id)->image}}" alt="user" class="img-responsive">
                @else
                 <img src="{{url('')}}/assets/images/user.png" alt="user" class="img-circle img-responsive">
                 @endif
         
                                </div>
                                <div class="col-md-8 col-lg-9">
    <h3 class="box-title m-b-0">{{\App\Parenting::find($parent->parent_id)->name}} <br>(Parent)</h3><br>
    <small><em>{{\App\Parenting::find($parent->parent_id)->address}}</em></small>
                                    <address>
                                        <br/>
                                       <div class="form-group">
                                <h4 class="card-title">@lang('admin.select') @lang('admin.type') *</h4>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                <div class="demo-radio-button">
                  <input name="pick" class="status" value="1" type="radio" id="radie_{{$loop->iteration}}" checked />
                      <label for="radie_{{$loop->iteration}}">@lang('admin.pickup')</label>
                      <input name="pick" class="status" value="0" type="radio" id="radif_{{$loop->iteration}}" />
                                    <label for="radif_{{$loop->iteration}}">@lang('admin.delivery')</label>
                                </div>
                            </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                             <div class="row">
                           <div class="col-md-1"></div>
                           <div class="col-md-8">
@if(count(\App\Pickup::where('student_id',$id)->where('date','>=',\Carbon\Carbon::today()->format('Y-m-d'))->get())>0)
<a href="javascript:void(0)" onclick="Studentpick('{{\App\Parenting::find($parent->parent_id)->id}}','{{$id}}','parent')" class="btn btn-warning btn-sm"><i class="fa fa-2x fa-check"></i> @lang('admin.recheckout') ({{\Carbon\Carbon::today()->toFormattedDateString()}})</a>
@else
<a href="javascript:void(0)" onclick="Studentpick('{{\App\Parenting::find($parent->parent_id)->id}}','{{$id}}','parent')" class="btn btn-info btn-sm"><i class="fa fa-2x fa-check"></i>  @lang('admin.checkout') ({{\Carbon\Carbon::today()->toFormattedDateString()}})</a>
@endif
<br>
                                      <small style="font-size: 12px;"></small>
                                  <label>&nbsp; &nbsp;</label>
                              </div>
                                    <div class="col-md-1"></div>
                                  </div>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
@endforeach
@foreach(\App\Related::where('student_id',$id)->where('status','1')->get() as $parent)
                    <div class="col-md-6 col-lg-6 col-xlg-6">
                        <div class="ribbon-wrapper-reverse card card-body">
            <div class="ribbon ribbon-bookmark ribbon-vertical-r ribbon-success"><i class="fa fa-user"></i></div>
             <div class="ribbon ribbon-corner ribbon-info"><i class="fa fa-user"></i></div>
                            <div class="row">

                                <div class="col-md-4 col-lg-3 text-center">
                <a >
    @if(\App\Parenting::find($parent->guardian_id)->image!='')
    <img style="width: 85px;" src="{{url('')}}/uploads/avatars/{{\App\Parenting::find($parent->guardian_id)->image}}" alt="user" class="img-responsive">
                @else
                 <img src="{{url('')}}/assets/images/user.png" alt="user" class="img-circle img-responsive">
                 @endif
            </a>
                                </div>
                                <div class="col-md-8 col-lg-9">
    <h3 class="box-title m-b-0">{{\App\Parenting::find($parent->guardian_id)->name}} <br>(Guardian)</h3><br>
    <small><em>{{\App\Parenting::find($parent->guardian_id)->address}}</em></small>
                                    <address>
                                        <br/>
                                       <div class="form-group">
                                <h4 class="card-title">@lang('admin.select') @lang('admin.type') *</h4>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                <div class="demo-radio-button">
                <input name="pick" value="1" class="status" type="radio" id="radiog_{{$loop->iteration}}" checked />
                      <label for="radiog_{{$loop->iteration}}">@lang('admin.pickup')</label>
                  <input name="pick" value="0" class="status" type="radio" id="radioh_{{$loop->iteration}}" />
                                    <label for="radioh_{{$loop->iteration}}">@lang('admin.delivery')</label>
                                </div>
                            </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                             <div class="row">
                           <div class="col-md-1"></div>
                           <div class="col-md-8">
@if(count(\App\Pickup::where('student_id',$id)->where('date','>=',\Carbon\Carbon::today()->format('Y-m-d'))->get())>0)
<a href="javascript:void(0)" onclick="Studentpick('{{\App\Parenting::find($parent->guardian_id)->id}}','{{$id}}','guard')" class="btn btn-warning btn-sm"><i class="fa fa-2x fa-check"></i>  @lang('admin.recheckout') ({{\Carbon\Carbon::today()->toFormattedDateString()}})</a>
@else
<a href="javascript:void(0)" onclick="Studentpick('{{\App\Parenting::find($parent->guardian_id)->id}}','{{$id}}','guard')" class="btn btn-info btn-sm"><i class="fa fa-2x fa-check"></i>@lang('admin.checkout')  ({{\Carbon\Carbon::today()->toFormattedDateString()}})</a>
@endif
<br>
                                      <small style="font-size: 12px;"></small>
                                  <label>&nbsp; &nbsp;</label>
                              </div>
                                    <div class="col-md-1"></div>
                                  </div>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
@endforeach
</div>
                            </div>
                        </div>
                    </div>
                </div>
  <script type="text/javascript">
              function Studentpick(userid,studid,type)
              {
                var rad=$("input:radio.status:checked").val()
                if(confirm('@lang('admin.press_ok') {{\App\Student::find($id)->gname}} @lang('admin.checkout')')){ 
                $.get('{{url('')}}/student/checkout/'+userid+'/'+studid+'/'+rad,function(data)
                {
                if(data==0){
                  swal("{{\App\Student::find($id)->gname}} @lang('admin.hcheck_seccess')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=24');
                }
            else{
                     swal("@lang('admin.error_checkout') {{\App\Student::find($id)->gname}}!", "@lang('admin.continue-button')", "error");
                    }    
                });
            }
              }
          </script>
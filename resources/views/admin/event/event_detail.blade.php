<div class="row el-element-overlay">
                    <div class="col-md-12">
                        <h4 class="card-title">@lang('admin.event_detail')</h4>
                        <h6 class="card-subtitle m-b-20 text-muted">@lang('admin.event_over')</code></h6> </div>
                        <div class="col-md-1"></div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> 
                                    @if(\App\Event::find($id)->image!='')
                                    <img src="{{url('')}}/uploads/avatars/{{\App\Event::find($id)->image}}" alt="user" />
                                    @elseif(\App\Event::find($id)->image=='')
                                     <img src="{{url('')}}/assets/images/background/error-bg.jpg" alt="user" />
                                     @endif
                                    <div class="el-overlay">
                                        <ul class="el-info">
                                            <li>
                                 @if(\App\Event::find($id)->image!='')
                                                <a class="btn default btn-outline image-popup-vertical-fit" href="javascript:void(0);"><i class="icon-magnifier"></i></a>
                                                 @elseif(\App\Event::find($id)->image=='')
                                                  <a class="btn default btn-outline image-popup-vertical-fit" href="javascript:void(0);"><i class="icon-magnifier"></i></a>
                                                  @endif
                                            </li>
                                            <li><a class="btn default btn-outline" href="javascript:void(0);"><i class="icon-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h3 class="box-title"><i class="fa fa-map-marker"></i> {{\App\Event::find($id)->venue}}</h3>
                                    <br/> 
                                     <label class="text-primary">@lang('admin.start-date-time'): {{\Carbon\Carbon::parse(\App\Event::find($id)->sdate)->toFormattedDateString()}} at {{\Carbon\Carbon::parse(\App\Event::find($id)->stime)->format('H:i a')}}</label><hr>
  <label class="text-danger">@lang('admin.end-date-time'): {{\Carbon\Carbon::parse(\App\Event::find($id)->edate)->toFormattedDateString()}} at {{\Carbon\Carbon::parse(\App\Event::find($id)->etime)->format('H:i a')}}</label><br> 
                                  </div>
                            </div>
                        </div>
        </div>
        <div class="col-md-5">
         <hr>
          <h3 class="box-title text-dark">{{\App\Event::find($id)->title}}</h3>
          <hr>
           <label>{{\App\Event::find($id)->description}}</label><br>

        </div>
</div>
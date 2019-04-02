<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">@lang('admin.add') @lang('admin.new') @lang('admin.notice')</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/edit/notice/board/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>@lang('admin.title')</label>
    <input type="text" class="form-control" value="{{\App\Noticeboard::find($id)->title}}" name="title">
                            </div>
                            </div>
                            <div class="col-md-3">
                             <div class="form-group">
                              <label>@lang('admin.start-date-time')</label>
                             <input type="text" value="{{\App\Noticeboard::find($id)->sdate}}" class="form-control mdate" name="sdate">
                            </div>
                        </div>  
                        <div class="col-md-3">
                             <div class="form-group">
                              <label>@lang('admin.end-date-time')</label>
                             <input type="text" value="{{\App\Noticeboard::find($id)->edate}}" class="form-control mdate" name="edate">
                            </div>
                        </div>  
                    </div>
            <div class="row">
                       
                        <div class="col-md-6"> 
                            <div class="form-group">
                             <label>@lang('admin.audience')</label>
                        <select class="form-control" name="status">
                  @if(\App\Noticeboard::find($id)->status==0)
                           <option value="0">@lang('admin.all')</option>
                            <option value="1">@lang('admin.staff') @lang('admin.only')</option>
                            <option value="2">@lang('admin.student') @lang('admin.only')</option>
                            <option value="5">@lang('admin.parent')/@lang('admin.guardian') @lang('admin.only')</option>
                            <option value="6">@lang('admin.public')</option>
                  @elseif(\App\Noticeboard::find($id)->status==1)
                  <option value="1">@lang('admin.staff') @lang('admin.only')</option>
                           <option value="0">@lang('admin.all')</option>
                            <option value="2">@lang('admin.student') @lang('admin.only')</option>
                            <option value="5">@lang('admin.parent')/@lang('admin.guardian') @lang('admin.only')</option>
                            <option value="6">@lang('admin.public')</option>
                  @elseif(\App\Noticeboard::find($id)->status==2)
                            <option value="2">@lang('admin.student') @lang('admin.only')</option>
                            <option value="0">@lang('admin.all')</option>
                            <option value="1">@lang('admin.staff') @lang('admin.only')</option>
                            <option value="5">@lang('admin.parent')/@lang('admin.guardian') @lang('admin.only')</option>
                            <option value="6">@lang('admin.public')</option>
                       @elseif(\App\Noticeboard::find($id)->status==5)
                             <option value="5">@lang('admin.parent')/@lang('admin.guardian') @lang('admin.only')</option>
                            <option value="0">@lang('admin.all')</option>
                            <option value="1">@lang('admin.staff') @lang('admin.only')</option>
                            <option value="2">@lang('admin.student') @lang('admin.only')</option>
                            <option value="6">@lang('admin.public')</option>
                        @elseif(\App\Noticeboard::find($id)->status==6)
                             <option value="6">@lang('admin.public')</option>
                             <option value="0">@lang('admin.all')</option>
                            <option value="1">@lang('admin.staff') @lang('admin.only')</option>
                            <option value="2">@lang('admin.student') @lang('admin.only')</option>
                            <option value="5">@lang('admin.parent')/@lang('admin.guardian') @lang('admin.only')</option>
                                 @endif
                        </select>
                            </div> 
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                             <label>@lang('admin.description')</label>
                           <textarea class="form-control" name="describe">{{\App\Noticeboard::find($id)->description}}</textarea> 
                            </div>  
                            </div>
                          <div class="col-md-12"> 
                            <div class="form-group">
                              <label>@lang('admin.notice') @lang('admin.image') (W1920 * H600)</label>
               <input type="file" id="input-file-now-custom-1" class="dropify" name="file" data-default-file="{{url('')}}/uploads/notice/{{\App\Noticeboard::find($id)->image}}" />  
                            </div>  
                        </div>
                </div>
                    <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block" value="@lang('admin.submit')">
                                     </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                  </form>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                 $('.mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
                 $(document).ready(function() {
            $('.select2').select2();
             $('.dropify').dropify();
         });
            </script>
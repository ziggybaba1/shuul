<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">@lang('admin.edit') @lang('admin.book') @lang('admin.issued') @lang('admin.status')</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/issue/change/status/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>@lang('admin.select') @lang('admin.collector')</label>
                            <select style="width: 100%;" class="form-control select2" name="student">
          @if(\App\Borrow::find($id)->dom1=='student')
                              <option value="{{\App\Borrow::find($id)->collector}}">{{\App\Student::find(\App\Borrow::find($id)->collector)->user_id}} {{\App\Student::find(\App\Borrow::find($id)->collector)->gname}} {{\App\Student::find(\App\Borrow::find($id)->collector)->fname}}</option>
          @else
           <option value="{{\App\Borrow::find($id)->collector}}">{{\App\Teacher::find(\App\Borrow::find($id)->collector)->user_id}} {{\App\Teacher::find(\App\Borrow::find($id)->collector)->gname}} {{\App\Teacher::find(\App\Borrow::find($id)->collector)->fname}}</option>
          @endif
                            </select>
                            </div>   
                            </div>
                                    <div class="col-md-6">
                                <div class="form-group">
                                  <label>@lang('admin.book') @lang('admin.issued')</label>
                           <select style="width: 100%;" class="form-control select2" name="book">
      <option value="{{\App\Borrow::find($id)->book}}">{{\App\Inventory::find(\App\Borrow::find($id)->book)->title}} </option>
                  @foreach(\App\Inventory::all() as $bookn)
                              <option value="{{$bookn->id}}">{{$bookn->title}}</option>
                              @endforeach
                            </select>
                                  </div>   
                                </div>
                              </div>
                       <div class="row">
                                        <div class="col-md-6">
                                           <div class="form-group">
                                         <label>@lang('admin.issued') @lang('admin.date')</label>
                            <input type="text" value="{{\App\Borrow::find($id)->idate}}" class="form-control mdate" name="idate">
                                      </div>   
                                        </div>
                        <div class="col-md-6">
                                      <div class="form-group">
                          <label>@lang('admin.expected') @lang('admin.return')</label>
                                        <input type="text" value="{{\App\Borrow::find($id)->rdate}}" class="form-control mdate" name="rdate">
                                      </div>   
                                        </div>
                                      </div>
                            <div class="row">
                                        <div class="col-md-6">
                                           <div class="form-group">
                                         <label> @lang('admin.status')</label>
                      <select class="form-control" required name="status">
                    <option value="">@lang('admin.select') @lang('admin.status')</option> 
                    <option>@lang('admin.return')</option>   
                    <option>@lang('admin.pending')</option>
                    <option>@lang('admin.damage')</option>
                      </select>
                                      </div>   
                                        </div>
                       
                                      </div>
                                     <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block text-white" value="@lang('admin.submit')">
                                     </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                  </form>
                        </div>
                    </div>
                </div>
            </div>
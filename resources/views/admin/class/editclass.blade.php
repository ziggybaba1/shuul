
 <div class="row">
    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                         @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.class_eform')</h4>
                            <h6 class="card-subtitle">@lang('admin.class_eform')</h6>
                            <form action="{{url('')}}/admin/edit/class/{{$id}}" method="post" class="form-horizontal m-t-40">
                                 {{ csrf_field() }}
                                <div class="form-group">
                                    <label>@lang('admin.name') <span class="help"></span></label>
                                    <input name="name" type="text" class="form-control" placeholder="Nursery 1" value="{{\App\Course::find($id)->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="example-email">@lang('admin.class_capa')<span class="help"></span></label>
                                    <input name="capacity" type="number" id="example-email" class="form-control" value="{{\App\Course::find($id)->capacity}}" placeholder="@lang('admin.class_max')">
                                </div>
                                <div class="form-group">
                                    <label>@lang('admin.code')<span class="help"></span></label>
                                    <input name="code" type="number" placeholder="" class="form-control" value="{{\App\Course::find($id)->code}}">
                                </div>
                               <div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary" value="@lang('admin.submit')">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>            
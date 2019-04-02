@extends('layouts.admin')
@section('content')
    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.class') @lang('admin.behave_person') @lang('admin.report')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.class') @lang('admin.behave_person') @lang('admin.report')</li>
                        </ol>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                              <h5 class="text-themecolor">Current Session: {{\App\Session::latest()->first()->session}} </h5><br>
                            <h5 class="text-themecolor">  ({{\App\Session::latest()->first()->terms}} Term)</h5>
                        </div>
                    </div>
                </div>
<div class="row">
                    <div class="col-sm-12">
                         @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.add') @lang('admin.class') @lang('admin.behave_person') @lang('admin.report')</h4>

 <form id="valid_form" action="{{url('')}}/admin/add/personal" enctype="multipart/form-data" method="post" class="form-horizontal m-t-40">
             {{ csrf_field() }}
    <div class="row">
         <div class="col-md-6">
            <div class="form-group">
              <label>@lang('admin.new') @lang('admin.behave_person') @lang('admin.type')</label>
           <input type="text" required class="form-control" placeholder="Add Behavioural Type" name="behave">
       </div>
        </div>
        <div class="col-md-6">
              <div class="form-group">
                <label>@lang('admin.select') @lang('admin.class')</label>
            <select name="class[]" required multiple class="form-control select2">
                <option value="">@lang('admin.select') @lang('admin.class')</option>
                 @foreach(\App\Course::all() as $class)
                            <option value="{{$class->id}}">{{$class->title}}</option>
                     @endforeach
            </select>
        </div>
        </div>
    </div>
   <br>
     <div class="row">
        
        <div class="col-md-4"></div>
        <div class="col-md-4">
           <input type="submit" name="" class="btn btn-primary btn-block btn-sm" value="@lang('admin.submit')">
        </div>
         <div class="col-md-4"></div>
        
     </div>
     </form>
</div>
</div>
</div>
<div id="showresultshere">
    <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.class') @lang('admin.behave_person') @lang('admin.report') @lang('admin.export')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.class')</th>
                                                <th>@lang('admin.behave_person')</th>
                                                <th>@lang('admin.edit')</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>#</th>
                                                <th>@lang('admin.class')</th>
                                                <th>@lang('admin.behave_person')</th>
                                                <th>@lang('admin.edit')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Course::all() as $class)
                                            <tr>
                                <td>{{$loop->iteration}}</td>
                                    <td>{{$class->title}}</td>
                <td>
            @foreach(\App\Behavioural::where('class_id',$class->id)->get() as $behave)
                    {{$behave->name}},
            @endforeach
                </td> 
                     <td><button onclick="showAjaxModal('{{url('')}}/edit/behaviour/{{$class->id}}')" class="btn btn-primary btn-sm btn-block"><i class="fa fa-eye"></i>@lang('admin.edit')</button></td>
                    
                                            </tr>
                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>
<script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
     $(document).ready(function() {
       $('.select2').select2();
         });
 $("#valid_form").submit(function(e) {
  var formDatan = new FormData(this);
   jQuery('#showresultshere').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:50px;" /></div>');
    $form = $(this);
  $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
        swal("@lang('admin.saved_info')", "@lang('admin.continue-button')", "success");
        jQuery('#showresultshere').html(data);
        $("#valid_form").reset();
      },
      error:function(data){
        swal("@lang('admin.error_save')", "@lang('admin.continue-button')", "error");
         jQuery('#showresultshere').hide();
      },
       cache: false,
        contentType: false,
        processData: false
 });
   e.preventDefault();
});
</script>
@endsection
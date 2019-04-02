 @extends('layouts.admin')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.room_bed')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.room_bed')</li>
                        </ol>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                              <h5 class="text-themecolor">@lang('admin.current-sess'): {{\App\Session::latest()->first()->session}} </h5><br>
                            <h5 class="text-themecolor"> (
                                @if(\App\Session::latest()->first()->terms==='First')
                                @lang('admin.first_term')
                                @elseif(\App\Session::latest()->first()->terms==='Second')
                                @lang('admin.second_term')
                                 @elseif(\App\Session::latest()->first()->terms==='Third')
                                @lang('admin.third_term')
                                 @elseif(\App\Session::latest()->first()->terms==='Fourth')
                                @lang('admin.fourth_term')
                             @endif
                             )
                         </h5>
                        </div>
                    </div>
                </div>

 <div class="row">
                    <div class="col-12">
                          @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.hostel_bed_ex')</h4>
                                <h6 class="card-subtitle">@lang('admin.hostel_bed_list')</h6>
                                 <div class="pull-left">
                               
                             </div>
                                <div class="table-responsive m-t-40">
                                    <table class="display nowrap table table-hover table-striped table-bordered customed" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.hostel')</th>
                                                <th>@lang('admin.room')</th>
                                                <th>@lang('admin.bed_name')</th>
                                                <th>@lang('admin.bed_code')</th>
                                                <th>@lang('admin.status')</th>
                                                 <th>@lang('admin.allocate_student')</th>
                                                <th>@lang('admin.allocate_date')</th>
                                               <th>@lang('admin.option')</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>#</th>
                                                <th>@lang('admin.hostel')</th>
                                                <th>@lang('admin.room')</th>
                                                <th>@lang('admin.bed_name')</th>
                                                <th>@lang('admin.bed_code')</th>
                                                <th>@lang('admin.status')</th>
                                                 <th>@lang('admin.allocate_student')</th>
                                                <th>@lang('admin.allocate_date')</th>
                                               <th>@lang('admin.option')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Bed::all() as $class)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{\App\Dormitory::find($class->dorm_id)->name}}</td>
                                                 <td>{{\App\Room::find($class->room_id)->name}}</td>
                                                <td>{{$class->name}}</td>
                                                <td>{{$class->code}}</td>
                                                 <td>
                                                    @if(count(\App\Allocate::where('bed_id',$class->id)->get())>0)
              @lang('admin.occupied')
    @elseif(count(\App\Allocate::where('bed_id',$class->id)->get())==0)
     @lang('admin.vacant')
     @endif
                                                 </td>
                                                <td>
      {{\App\Student::findOrFail(\App\Allocate::where('bed_id',$class->id)->first()->user_id)->username}} {{\App\Student::findOrFail(\App\Allocate::where('bed_id',$class->id)->first()->user_id)->gname}} {{\App\Student::findOrFail(\App\Allocate::where('bed_id',$class->id)->first()->user_id)->fname}}    
                                                </td>
        <td>{{\Carbon\Carbon::parse($class->created_at)->toFormattedDateString()}}</td>
                    <td><div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-settings"></i></button>
     <div class="dropdown-menu ">
    @if(count(\App\Allocate::where('bed_id',$class->id)->get())>0)
                <a onclick="showAjaxModal('{{url('')}}/allocate/hostel/bed/{{$class->id}}')" class="dropdown-item" href="javascript:void(0)"> @lang('admin.re_allocate')</a>
    @elseif(count(\App\Allocate::where('bed_id',$class->id)->get())==0)
     <a onclick="showAjaxModal('{{url('')}}/allocate/hostel/bed/{{$class->id}}')" class="dropdown-item" href="javascript:void(0)">@lang('admin.allocate_bed')</a>
     @endif
                <a onclick="showAjaxModal('{{url('')}}/edit/show/bed/{{$class->id}}')" class="dropdown-item" href="javascript:void(0)">@lang('admin.edit')</a>
                <a class="dropdown-item" onclick="deletebed('{{$class->id}}')" href="javascript:void(0)">@lang('admin.delete')</a>
      </div>
          </div></td>
                                            </tr>
                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
          <script type="text/javascript">
              function deletebed(id)
              {
                if(confirm('Press Ok to confirm delete!!!')){ 
                $.get('{{url('')}}/delete/bed/'+id,function(data)
                {
                if(data==0){
                  swal("@lang('admin.account_delete')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=70');
                }
            else{
                     swal("@lang('admin.error_delete')", "@lang('admin.continue-button')", "error");
                    }     
                });
            }
              }
          </script>
                @endsection
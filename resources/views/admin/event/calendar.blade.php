@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.school_calendar')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.school_calendar')</li>
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
  <div class="col-md-12">
     @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                      @if (session('error'))
                 <div class="alert alert-danger alert-rounded">{{ session('error') }}</div>
                    @endif
                  </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
          <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div id="calendar-events" class="m-t-20">
                                 @foreach(\App\Procedure::all() as $procedure)
                                <div class="row">
                    <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
                        <button style="background-color:{{$procedure->color}};color:white;font-weight: bold; " onclick="showAjaxModal('{{url('')}}/create/event/category/{{$procedure->id}}')" class="btn btn-lg m-t-30 btn-block waves-effect waves-light" data-class="bg-info">{{$procedure->name}}</button><button onclick="deleteprocedure('{{$procedure->id}}')" class="btn btn-lg m-t-30 waves-effect waves-light" onclick=""><i class="fa fa-remove text-info"></i></button>
                    </div>
                    </div>
                                @endforeach
                                        </div>
                                        <!-- checkbox -->
            <button onclick="showAjaxModal('{{url('')}}/new/category/event')"  class="btn btn-lg m-t-40 btn-primary btn-block waves-effect waves-light">
                                            <i class="ti-plus"></i> @lang('admin.add_new_event')
                                        </button>
                                    </div>
                                </div>
                            </div>
                                    </div>        
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
         <script type="text/javascript">
             function deleteprocedure(id)
              {
                if(confirm("@lang('admin.confirm_delete')")){ 
                $.get('{{url('')}}/delete/event/category/'+id,function(data)
                {
                if(data==0){
                  swal("@lang('admin.account_delete')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=43');
                }
            else{
                     swal("@lang('admin.error_delete')", "@lang('admin.continue-button')", "error");
                    }      
                });
            }
              }
         </script>      
                
@endsection
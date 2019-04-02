@extends('layouts.student')
@section('content')
<div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor">{{\Auth::user()->name}} @lang('admin.pickup')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.pickup')</li>
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
                    <div class="col-sm-12">
                        @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                      @if (session('error'))
                 <div class="alert alert-warning alert-rounded">{{ session('error') }}</div>
                    @endif
                        <div class="card card-body">
                            <h4 class="card-title">{{\Auth::user()->name}} @lang('admin.pickup') @lang('admin.status')</h4>
                            <h6 class="card-subtitle">@lang('admin.pickup-filter')</h6>

    <div class="row">

                    <div class="col-sm-3">
                             <div class="form-group">
            <label for="example-email">@lang('admin.select') @lang('admin.class') *<span class="help"></span></label>
            <input type="hidden" id="searchvalue" value="5" name="">
            <select id="classdetail" required class="form-control select2">
<option value="{{\App\Student::where('data_id',\Auth::user()->id)->first()->class}}">{{\App\Course::find(\App\Student::where('data_id',\Auth::user()->id)->first()->class)->title}}</option>   
            </select>
                                </div>
                              </div>
              <div class="col-sm-3">
                             <div class="form-group">
            <label for="example-email">@lang('admin.student') *<span class="help"></span></label>
            <input type="hidden" id="searchvalue" value="5" name="">
            <select id="studentdetail" required class="form-control select2">
            <option value="{{\App\Student::where('data_id',\Auth::user()->id)->first()->id}}">{{\Auth::user()->name}}</option>   
            </select>
                                </div>
                              </div>
                     <div class="col-sm-6">
                             <div class="form-group">
                      <label for="example-email">@lang('admin.pick-range') *<span class="help"></span></label>
                               <div class="input-daterange input-group" id="date-range">
                                                <input type="text" id="date-start" placeholder="@lang('admin.start_date')" class="form-control" name="start" />
                                                <span class="input-group-addon bg-danger b-0 text-white">@lang('admin.to')</span>
                                                <input type="text" placeholder="@lang('admin.end_date')" id="date-end" class="form-control" name="end" />
                                </div>
                        </div>
                              
                        </div>
                        </div>
                   <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                               <h4 class="card-title m-t-40">@lang('admin.date_get_pickup'):</h4>
                                <div id="paginator4"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>   
 <div id="showtable"></div>
  <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
      <script type="text/javascript">
    $(document).ready(function(){
        $('#date-end').bootstrapMaterialDatePicker({ weekStart : 0,time:false});
        $('#date-start').bootstrapMaterialDatePicker({ weekStart : 0,time:false }).on('change', function(e, date)
        {
            $('#date-end').bootstrapMaterialDatePicker('setMinDate', date);
            $('#date-end').bootstrapMaterialDatePicker('setMaxDate',moment(date).add(30, 'day').format());
            var datepaginator = function() {
        return {
            init: function() {
                    $("#paginator4").datepaginator({
                      format: 'YYYY-MM-DD',
                      startDate: date,
                      endDate: moment(date).add(30, 'day').format(),
                        onSelectedDateChanged: function(a, t) {
                         $.get('{{url('')}}/get/pickup?student='+$('#studentdetail').val()+'&date='+moment(t).format("YYYY-MM-DD"), function(data) { 
                      if(data.status=='1'&&data.typo=='1'){
                         swal("@lang('admin.pick_by') " + data.user+" @lang('admin.at') "+data.time+" @lang('admin.on') "+ moment(t).format("Do, MMM YYYY"), "@lang('admin.continue-button')", "success");
                      }
                      if(data.status=='1'&&data.typo=='0'){
                         swal("@lang('admin.deliver_to') " + data.user+" @lang('admin.at') "+data.time+" @lang('admin.on') "+ moment(t).format("Do, MMM YYYY"), "@lang('admin.continue-button')", "success");
                      }
                      if(data.status=='2'){
                         swal("@lang('admin.not_pickup') " + moment(t).format("Do, MMM YYYY"), "@lang('admin.continue-button')", "error");
                      }
                      if(data.status=='3'){
                         swal("@lang('admin.attend-error')", "@lang('admin.continue-button')", "error");
                      }
                         });
                        
                        }
                    })
            }
        }
    }();
     datepaginator.init();
        });
    });
   jQuery(document).ready(function() {
       
    });
    </script>
@endsection
<div class="row">
                    <div class="col-sm-12">
                        @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                      @if (session('error'))
                 <div class="alert alert-warning alert-rounded">{{ session('error') }}</div>
                    @endif
                        <div class="card card-body">
                            <h4 class="card-title">{{\App\User::find(\App\Student::find($id)->data_id)->name}} @lang('parent.pickup-status')</h4>
                            <h6 class="card-subtitle">@lang('parent.pickup-filter')</h6>

    <div class="row">

                    <div class="col-sm-3">
                             <div class="form-group">
            <label for="example-email">@lang('parent.class') *<span class="help"></span></label>
            <input type="hidden" id="searchvalue" value="5" name="">
            <select id="classdetail" required class="form-control select2">
<option value="{{\App\Student::findOrFail($id)->class}}">{{\App\Course::find(\App\Student::findOrFail($id)->class)->title}}</option>   
            </select>
                                </div>
                              </div>
              <div class="col-sm-3">
                             <div class="form-group">
            <label for="example-email">@lang('parent.student') *<span class="help"></span></label>
            <input type="hidden" id="searchvalue" value="5" name="">
            <select id="studentdetail" required class="form-control select2">
            <option value="{{$id}}">{{\App\Student::findOrFail($id)->gname}} {{\App\Student::findOrFail($id)->fname}}</option>   
            </select>
                                </div>
                              </div>
                     <div class="col-sm-6">
                             <div class="form-group">
                      <label for="example-email">@lang('parent.pick-range') *<span class="help"></span></label>
                               <div class="input-daterange input-group" id="date-range">
                                                <input type="text" id="date-start" placeholder="Start Date" class="form-control" name="start" />
                                                <span class="input-group-addon bg-danger b-0 text-white">to</span>
                                                <input type="text" placeholder="End Date" id="date-end" class="form-control" name="end" />
                                </div>
                        </div>
                              
                        </div>
                        </div>
                   <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                               <h4 class="card-title m-t-40">@lang('parent.date-pickup-status') {{\App\User::find(\App\Student::find($id)->data_id)->name}} @lang('parent.pickup-status'):</h4>
                                <div id="paginator4"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>   
 <div id="showtablen"></div>
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
                         swal("@lang('parent.pickup-by') " + data.user+", "+data.time+", "+ moment(t).format("Do, MMM YYYY"), "@lang('parent.continue-button')", "success");
                      }
                      if(data.status=='1'&&data.typo=='0'){
                         swal("@lang('parent.pickup-del') " + data.user+", "+data.time+", "+ moment(t).format("Do, MMM YYYY"), "@lang('parent.continue-button')", "success");
                      }
                      if(data.status=='2'){
                         swal("@lang('parent.pickup-error') " + moment(t).format("Do, MMM YYYY"), "@lang('parent.continue-button')", "error");
                      }
                      if(data.status=='3'){
                         swal("@lang('parent.attend-error')", "@lang('parent.continue-button')", "error");
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
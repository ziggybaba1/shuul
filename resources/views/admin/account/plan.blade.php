@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.schoolin-fee') @lang('admin.plan')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.schoolin-fee') @lang('admin.plan')</li>
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
                <div class="pull-right">
            <button data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-primary btn-block">@lang('admin.add')  @lang('admin.payment')  @lang('admin.plan')</button>
                </div>
                                <h4 class="card-title">@lang('admin.schoolin-fee') @lang('admin.plan')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.plan') @lang('admin.name')</th>
                                                <th>@lang('admin.pay_time')</th>
                                                <th>@lang('admin.pay') @lang('admin.percent')</th>
                                                <th>@lang('admin.option')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>#</th>
                                               <th>@lang('admin.plan') @lang('admin.name')</th>
                                                <th>@lang('admin.pay_time')</th>
                                                <th>@lang('admin.payment') @lang('admin.percent')</th>
                                                <th>@lang('admin.option')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Plan::where('delete','0')->get() as $class)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$class->name}}</td>
                                                <td>{{$class->number}}</td>
                                                 <td>
                                              @foreach(\App\Planlist::where('plan_id',$class->id)->get() as $plan)
                                                 {{$loop->iteration}}=>{{$plan->percent}}%<br>
                                                  @endforeach
                                                </td>
                     <td>
                         <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-settings"></i>
                                    </button>
                                    <div class="dropdown-menu">
                        <a onclick="showAjaxModal('{{url('')}}/edit/fee/plan/{{$class->id}}')" class="dropdown-item" href="javascript:void(0)">@lang('admin.edit')</a>
                        <a class="dropdown-item" onclick="deleteaccount('{{$class->id}}')" href="javascript:void(0)">@lang('admin.delete')</a>
                                    </div>
                            </div>
                     </td>
                                            </tr>
                        @endforeach
                                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div> 
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">{{\App\Provider::first()->name}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                      <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">@lang('admin.schoolin-fee') @lang('admin.plan')</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/fee/school/plan" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
                            <div class="form-group">
                              <label>@lang('admin.plan') @lang('admin.name')</label>
                             <input type="text" class="form-control" name="name">
                            </div>
                             <div class="form-group">
                              <label>@lang('admin.pay_time')</label>
                              <select id="paytime" class="form-control" name="number">
                                 <option>@lang('admin.select') @lang('admin.pay_time')</option>
                                  <option>1</option>
                                 <option>2</option>
                                 <option>3</option>
                                 <option>4</option>
                                 <option>5</option>
                              </select>
                            </div>
                            <div class="showadd">
                             <div class="form-group">
                                  <label>@lang('admin.reminder') @lang('admin.message') (@lang('admin.max_length') 150)</label>
                            <textarea class="form-control" maxlength="150" name="message" placeholder="@lang('admin.add') @lang('admin.message')"></textarea>
                                </div>
                                <div class="checkbox checkbox-primary">
                                <input id="checkbox4" type="checkbox" checked value="1" name="email">
                                                    <label style="color: black;" for="checkbox4">
                                                        @lang('admin.enable_email_rem')
                                                    </label>
                                                </div>
                                                <div class="checkbox checkbox-primary">
                                <input id="checkbox5" type="checkbox" checked value="1" name="sms">
                                                    <label style="color: black;" for="checkbox5">
                                                       @lang('admin.enable_sms_rem')
                                                    </label>
                                                </div>
                                              </div>
                             <span id="medicine">

                             </span>
                               <span id="medicine_input">
                             <div class="form-group">
                              <label>@lang('admin.payment') @lang('admin.percent')</label>
                              <div class="input-group">
                             <input type="number" class="form-control dpercent" name="percent[]">
                    <input type="number" class="form-control cpercent" placeholder="@lang('admin.com_fee')" name="cpercent[]">
                    <input type="number" class="form-control daym"  placeholder="@lang('admin.day_int')" name="days[]">
                           </div>
                            </div>
                          </span>
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
                          </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">@lang('admin.close')</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
                                <script type="text/javascript">
                                    function deleteaccount(id)
              {
                if(confirm("@lang('admin.confirm_delete')")){ 
                $.get('{{url('')}}/delete/plan/'+id,function(data)
                {
                if(data==0){
                  swal("@lang('admin.account_delete')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=81');
                }
            else{
                     swal("@lang('admin.error_delete')", "@lang('admin.continue-button')", "error");
                    }    
                });
            }
              }
                                </script> 
                                <script type="text/javascript">
   $("#paytime").change(function(){
  var val = $(this).val();
  $("#medicine").html('');
for(var i=0;i<val;i++){
   add_medicine();
}
if(val==1)
{
  $('.daym').hide();$('.cpercent').hide();$('.showadd').hide();
  $('.dpercent').val('100');
}
else{$('.showadd').show();}
});
    var medicine_count      = 0;
    var total_amount        = 0;
    var deleted_medicines   = [];
    
    // CREATING BLANK medicine INPUT
    var blank_medicine = '';
    $(document).ready(function () {
      $('#medicine_input').hide();
        blank_medicine = $('#medicine_input').html();
    });
    function add_medicine()
    {
        medicine_count++;
        $("#medicine").append(blank_medicine);

        $('#medicine_id').attr('id', 'medicine_id_' + medicine_count);
       
    }
</script>        
@endsection
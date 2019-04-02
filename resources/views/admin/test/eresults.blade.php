@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.e_test') @lang('admin.result')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.e_test') @lang('admin.result')</li>
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
                <div id="showresultshere">
                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.e_test') @lang('admin.result')</h4>
                                <h6 class="card-subtitle">@lang('admin.e_test') @lang('admin.result')</h6>
                                <div class="table-responsive m-t-40">
      <table  class="display nowrap table  table-bordered customed" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.type')</th>
                                                <th>@lang('admin.class')</th>
                                                <th>@lang('admin.student')</th>
                                                <th>@lang('admin.batch')</th>
                                               <th>@lang('admin.subject')</th>
                                                <th>@lang('admin.score')</th>
                                                 <th>@lang('admin.use_as')</th>
                                                <th>@lang('admin.date_submit')</th>
                                               <th>@lang('admin.generate') @lang('admin.score')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>#</th>
                                               <th>@lang('admin.type')</th>
                                                <th>@lang('admin.class')</th>
                                                <th>@lang('admin.student')</th>
                                                 <th>@lang('admin.batch')</th>
                                               <th>@lang('admin.subject')</th>
                                                <th>@lang('admin.score')</th>
                                                  <th>@lang('admin.use_as')</th>
                                                <th>@lang('admin.date_submit')</th>
                                               <th>@lang('admin.generate') @lang('admin.score')</th>
                                            </tr>
                                        </tfoot>
                      <tbody>
@foreach(\App\Esubmit::latest()->get() as $batch)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                              @if(\App\Batch::find($batch->batch_id)->type=='1')
                        <td>Student</td>
                    @elseif(\App\Batch::find($batch->batch_id)->type=='2')
                        <td>Staff</td>
                    @endif
                            <td>
                           @if(\App\Batch::find($batch->batch_id)->type=='1')
                              {{\App\Course::find(\App\Batch::find($batch->batch_id)->class)->title}}
                              @endif
                            </td>
                              <td>
        @if(\App\Batch::find($batch->batch_id)->type=='1')
          {{\App\User::find(\App\Student::find($batch->student_id)->data_id)->name}}
          @elseif(\App\Batch::find($batch->batch_id)->type=='2')
{{\App\User::find(\App\Teacher::find($batch->student_id)->user_table)->name}}
          @endif
        </td>
                              <td>
 @if(\App\Batch::find($batch->batch_id)->batch=='1')
   Batch A
   @elseif(\App\Batch::find($batch->batch_id)->batch=='2')
    Batch B
     @elseif(\App\Batch::find($batch->batch_id)->batch=='3')
    Batch C
     @elseif(\App\Batch::find($batch->batch_id)->batch=='4')
    Batch D
 @elseif(\App\Batch::find($batch->batch_id)->batch=='5')
    Batch E
 @elseif(\App\Batch::find($batch->batch_id)->batch=='6')
    Batch F
 @elseif(\App\Batch::find($batch->batch_id)->batch=='7')
    Batch G
 @elseif(\App\Batch::find($batch->batch_id)->batch=='8')
    Batch H
    @endif
                    </td>
                        <td>
                           @if(\App\Batch::find($batch->batch_id)->type=='1')
                          {{\App\Subject::find(\App\Batch::find($batch->batch_id)->subject)->title}}
                          @elseif(\App\Batch::find($batch->batch_id)->type=='2')
                          {{\App\Batch::find($batch->batch_id)->subject}}
                          @endif
                            
                     </td>
                   
                     <td style="text-align: center;">{{$batch->score}}%
@if($batch->score=='')
                         <span class="label label-info m-r-10">@lang('admin.new')!!</span>
                         @elseif($batch->score!='')
                          <span class="label label-success m-r-10">@lang('admin.new') @lang('admin.score')!!</span>
                         @endif
                     </td>
                     <td style="text-align: center;">
                       @if(\App\Batch::find($batch->batch_id)->type=='2')
                      @if(\App\Batch::find($batch->batch_id)->use==='Other')
                      @lang('admin.other')
                      @elseif(\App\Batch::find($batch->batch_id)->use==='Practise')
                       @lang('admin.practise')
                       @endif
                       @elseif(\App\Batch::find($batch->batch_id)->type=='1')
                        @if(\App\Batch::find($batch->batch_id)->use==='Other')
                      @lang('admin.other')
                      @elseif(\App\Batch::find($batch->batch_id)->use==='Practise')
                       @lang('admin.practise')
                        @elseif(\App\Batch::find($batch->batch_id)->use==='Test')
                       @lang('admin.test')
                        @elseif(\App\Batch::find($batch->batch_id)->use==='Examination')
                       @lang('admin.examination')
                       @endif
                       @endif
                     </td>
                        <td>{{\Carbon\Carbon::parse($batch->created_at)->toFormattedDateString()}}</td>
                        <td><button onclick="showAjaxModal('{{url('')}}/etest/generate/score/{{$batch->id}}')" class="btn btn-primary btn-sm">@lang('admin.generate') @lang('admin.score')</button></td>
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
          

@endsection
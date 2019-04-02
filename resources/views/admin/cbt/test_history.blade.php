@extends('layouts.admin')
@section('content')
<div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor">{{\Auth::user()->name}} @lang('admin.e_test_ex')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.e_test_ex')</li>
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
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.e_test') Export</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                               <th>@lang('admin.subject')</th>
                                                <th>@lang('admin.batch')</th>
                                                <th>@lang('admin.score')</th>
                                                <th>@lang('admin.date_submit')</th>
                                               <th>@lang('admin.result')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>#</th>
                                               <th>@lang('admin.subject')</th>
                                                <th>@lang('admin.batch')</th>
                                                <th>@lang('admin.score')</th>
                                                <th>@lang('admin.date_submit')</th>
                                               <th>@lang('admin.result')</th>
                                            </tr>
                                        </tfoot>
                      <tbody>
                        
@foreach(\App\Esubmit::where('student_id',\App\Teacher::where('user_table',\Auth::user()->id)->first()->id)->latest()->get() as $batch)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                           
                        <td>{{\App\Batch::find($batch->batch_id)->subject}}
                            @if($batch->score=='')
                         <span class="label label-info m-r-10">@lang('admin.new')</span>
                         @elseif($batch->score!='')
                          <span class="label label-success m-r-10">@lang('admin.new') @lang('admin.score')</span>
                         @endif
                     </td>
                     <td>{{\App\Batch::find($batch->batch_id)->batch}}</td>
                     <td>{{$batch->score}}%</td>
                        <td>{{\Carbon\Carbon::parse($batch->created_at)->toFormattedDateString()}}</td>
                         <td>
 @if($batch->score!='')
                          <button onclick="showAjaxModal('{{url('')}}/etest/generate/score/{{$batch->id}}')" class="btn btn-primary btn-sm">@lang('admin.view_score')</button>
@endif
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
@endsection
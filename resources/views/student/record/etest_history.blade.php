@extends('layouts.student')
@section('content')
<div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor">{{\Auth::user()->name}} @lang('admin.e_test') @lang('admin.result')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/parent/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.e_test')</li>
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
                                <h4 class="card-title">@lang('admin.e_test') @lang('admin.result')</h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                 <th>@lang('admin.class')</th>
                                               <th>@lang('admin.subject')</th>
                                                <th>@lang('admin.batch')</th>
                                                <th>@lang('admin.score')</th>
                                                <th>@lang('admin.date_submit')</th>
                                               <th>@lang('admin.view') @lang('admin.result')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>#</th>
                                              <th>@lang('admin.class')</th>
                                               <th>@lang('admin.subject')</th>
                                                <th>@lang('admin.batch')</th>
                                                <th>@lang('admin.score')</th>
                                                <th>@lang('admin.date_submit')</th>
                                               <th>@lang('admin.view') @lang('admin.result')</th>
                                            </tr>
                                        </tfoot>
                      <tbody>
@foreach(\App\Esubmit::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->latest()->get() as $batch)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{\App\Course::find(\App\Batch::find($batch->batch_id)->class)->title}}</td>
                        <td>{{\App\Subject::find(\App\Batch::find($batch->batch_id)->subject)->title}}
                            @if($batch->score=='')
                         <span class="label label-info m-r-10">New!!</span>
                         @elseif($batch->score!='')
                          <span class="label label-success m-r-10">New Score!!</span>
                         @endif
                     </td>
                     <td>{{\App\Batch::find($batch->batch_id)->batch}}</td>
                     <td>{{$batch->score}}%</td>
                        <td>{{\Carbon\Carbon::parse($batch->created_at)->toFormattedDateString()}}</td>
                         <td>
 @if($batch->score!='')
                          <button onclick="showAjaxModal('{{url('')}}/etest/generate/score/{{$batch->id}}')" class="btn btn-primary">@lang('admin.view') @lang('admin.result')</button>
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
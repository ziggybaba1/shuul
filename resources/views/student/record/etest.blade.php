@extends('layouts.student')
@section('content')
<div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor">{{\Auth::user()->name}} @lang('admin.e_test')</h3>
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
                                <h4 class="card-title">@lang('admin.e_test') @lang('admin.list')</h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                               <th>@lang('admin.subject')</th>
                                                <th>@lang('admin.duration')</th>
                                                <th>@lang('admin.batch')</th>
                                                <th>@lang('admin.total') @lang('admin.question')</th>
                                                <th>@lang('admin.start-date-time')</th>
                                                <th>@lang('admin.instruction')</th>
                                                <th>@lang('admin.action')</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>@lang('admin.subject')</th>
                                                <th>@lang('admin.duration')</th>
                                                <th>@lang('admin.batch')</th>
                                                <th>@lang('admin.total') @lang('admin.question')</th>
                                                <th>@lang('admin.start-date-time')</th>
                                                <th>@lang('admin.instruction')</th>
                                                <th>@lang('admin.action')</th>
                                            </tr>
                                        </tfoot>
                      <tbody>
                @foreach(\App\Assign::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->latest()->get() as $batch)
               @if($batch->type=='1')
                        <tr>
                        <td>{{\App\Subject::find(\App\Batch::find($batch->batch_id)->subject)->title}} <span class="label label-info m-r-10">New!!</span></td>
                        <td>{{\App\Batch::find($batch->batch_id)->duration}} minutes</td>
                        <td>{{\App\Batch::find($batch->batch_id)->batch}}</td>
                    <td>{{count(\App\Question::where('batch_id',$batch->batch_id)->get())}}</td>
                        <td>{{\App\Batch::find($batch->batch_id)->date}}</td>
                        <td>{{\App\Batch::find($batch->batch_id)->instruction}}</td>
    <td>
        @if(\App\Batch::find($batch->batch_id)->date<=\Carbon\Carbon::today()->format('Y-m-d'))
        <a href="{{url('')}}/student/{{\Auth::user()->email}}/answer_questions?quiz={{$batch->batch_id}}" class="btn btn-md btn-block btn-primary"><i class="fa fa-plus"></i>@lang('admin.take_test')</a>
        @endif
    </td>

                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
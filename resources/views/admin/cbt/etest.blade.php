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
                                <h4 class="card-title">@lang('admin.e_test_export')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                               <th>@lang('admin.subject')</th>
                                                <th>@lang('admin.duration')</th>
                                                <th>@lang('admin.batch')</th>
                                                <th>@lang('admin.total_question')</th>
                                                <th>@lang('admin.start_date')</th>
                                                <th>@lang('admin.instruction')</th>
                                                <th>@lang('admin.option')</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>@lang('admin.subject')</th>
                                                <th>@lang('admin.duration')</th>
                                                <th>@lang('admin.batch')</th>
                                                <th>@lang('admin.total_question')</th>
                                                <th>@lang('admin.start_date')</th>
                                                <th>@lang('admin.instruction')</th>
                                                <th>@lang('admin.option')</th>
                                            </tr>
                                        </tfoot>
                      <tbody>
                @foreach(\App\Assign::all() as $batch)
                @if($batch->student_id==\App\Teacher::where('user_table',\Auth::user()->id)->first()->id)
                        <tr>
                        <td>{{\App\Batch::find($batch->batch_id)->subject}} <span class="label label-info m-r-10">@lang('admin.new')</span></td>
                        <td>{{\App\Batch::find($batch->batch_id)->duration}} @lang('admin.minutes')</td>
                        <td>{{\App\Batch::find($batch->batch_id)->batch}}</td>
                    <td>{{count(\App\Question::where('batch_id',$batch->batch_id)->get())}}</td>
                        <td>{{\App\Batch::find($batch->batch_id)->date}}</td>
                        <td>{{\App\Batch::find($batch->batch_id)->instruction}}</td>
    <td>
    @if(count(\App\Esubmit::where('batch_id',$batch->batch_id)->where('student_id',\App\Teacher::where('user_table',\Auth::user()->id)->first()->id)->get())==0)
    <a href="{{url('')}}/staff/{{\Auth::user()->email}}/answer_questions?quiz={{$batch->batch_id}}" class="btn btn-primary text-white"><i class="fa fa-plus"></i>@lang('admin.take_test')</a>
@elseif(count(\App\Esubmit::where('batch_id',$batch->batch_id)->where('student_id',\App\Teacher::where('user_table',\Auth::user()->id)->first()->id)->get())>0)
<span class="btn btn-success text-white">@lang('admin.test_submit')</span>
@endif
</td>
   @endif
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
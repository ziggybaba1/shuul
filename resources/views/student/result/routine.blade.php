
@extends('layouts.student')
@section('content')
<div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.time_table')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.time_table')</li>
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
                                <h4 class="card-title">{{\App\Course::find(\App\Student::where('data_id',\Auth::user()->id)->first()->class)->title}}  @lang('admin.time_table')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.week_day')</th>
                                                <th>1</th>
                                                <th>2</th>
                                                <th>3</th>
                                                <th>4</th>
                                                <th>5</th>
                                                <th>6</th>
                                               <th>7</th>
                                                <th>8</th>
                                                <th>9</th>
                                                <th>10</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>#</th>
                                                <th>@lang('admin.week_day')</th>
                                                 <th>1</th>
                                                <th>2</th>
                                                <th>3</th>
                                                <th>4</th>
                                                <th>5</th>
                                                <th>6</th>
                                               <th>7</th>
                                                <th>8</th>
                                                <th>9</th>
                                                <th>10</th>
                                           
                                            </tr>
                                        </tfoot>
                      <tbody>
                <tr>
                    <td>1</td>
                <td>@lang('admin.monday')</td>
@if(count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Monday')->get())>0)
@foreach(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Monday')->get() as $table)
                <td>{{\App\Subject::find($table->subject)->code}}<br>
    <label>@lang('admin.from'):</label>{{$table->from}} <label>@lang('admin.to'):</label>{{$table->to}}<br>
                {{\App\Teacher::find($table->teacher)->gname}} {{\App\Teacher::find($table->teacher)->fname}}</td>
                @endforeach
    @for($i=count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Monday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @elseif(count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Monday')->get())==0)
    @for($i=count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Monday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @endif
                        </tr>
                        <tr>
                             <td>2</td>
    <td>@lang('admin.tuesday')</td>
     @if(count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Tuesday')->get())>0)
    @foreach(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Tuesday')->get() as $table)
                <td>{{\App\Subject::find($table->subject)->code}}<br>
   <label>@lang('admin.from'):</label>{{$table->from}} <label>@lang('admin.to'):</label>{{$table->to}}<br>
                {{\App\Teacher::find($table->teacher)->gname}} {{\App\Teacher::find($table->teacher)->fname}}</td>
                @endforeach
     @for($i=count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Tuesday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @elseif(count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Tuesday')->get())==0)
    @for($i=count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Tuesday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @endif
                        </tr>
    <tr>
         <td>3</td>
    <td>@lang('admin.wednessday')</td>
 @if(count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Wednessday')->get())>0)
@foreach(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Wednessday')->get() as $table)
                <td>{{\App\Subject::find($table->subject)->code}}<br>
   <label>@lang('admin.from'):</label>{{$table->from}} <label>@lang('admin.to'):</label>{{$table->to}}<br>
                {{\App\Teacher::find($table->teacher)->gname}} {{\App\Teacher::find($table->teacher)->fname}}</td>
                @endforeach
@for($i=count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Wednessday')->get());$i<=9;$i++)
    <td></td>
    @endfor
@elseif(count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Wednessday')->get())==0)
    @for($i=count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Wednessday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @endif
                        </tr>
                        <tr>
                             <td>4</td>
    <td>@lang('admin.thursday')</td>
@if(count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Thursday')->get())>0)
@foreach(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Thursday')->get() as $table)
                <td>{{\App\Subject::find($table->subject)->code}}<br>
    <label>@lang('admin.from'):</label>{{$table->from}} <label>@lang('admin.to'):</label>{{$table->to}}<br>
                {{\App\Teacher::find($table->teacher)->gname}} {{\App\Teacher::find($table->teacher)->fname}}</td>
                @endforeach
@for($i=count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Thursday')->get());$i<=9;$i++)
    <td></td>
    @endfor
@elseif(count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Thursday')->get())==0)
    @for($i=count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Thursday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @endif
                        </tr>
                        <tr>
                             <td>5</td>
    <td>@lang('admin.friday')</td>
@if(count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Friday')->get())>0)
@foreach(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Friday')->get() as $table)
                <td>{{\App\Subject::find($table->subject)->code}}<br>
            <label>@lang('admin.from'):</label>{{$table->from}} <label>@lang('admin.to'):</label>{{$table->to}}<br>
                {{\App\Teacher::find($table->teacher)->gname}} {{\App\Teacher::find($table->teacher)->fname}}</td>
                @endforeach
 @for($i=count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Friday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @elseif(count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Friday')->get())==0)
    @for($i=count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Friday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @endif
                        </tr>
                         <tr>
                             <td>6</td>
    <td>@lang('admin.saturday')</td>
     @if(count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Saturday')->get())>0)
@foreach(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Saturday')->get() as $table)
                <td>{{\App\Subject::find($table->subject)->code}}<br>
                <label>@lang('admin.from'):</label>{{$table->from}} <label>@lang('admin.to'):</label>{{$table->to}}<br>
                {{\App\Teacher::find($table->teacher)->gname}} {{\App\Teacher::find($table->teacher)->fname}}</td>
                @endforeach
@for($i=count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Saturday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @elseif(count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Saturday')->get())==0)
    @for($i=count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Saturday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @endif
                        </tr>
                         <tr>
                             <td>7</td>
    <td>@lang('admin.sunday')</td>
@if(count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Sunday')->get())>0)
@foreach(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Sunday')->get() as $table)
                <td>{{\App\Subject::find($table->subject)->code}}<br>
                    @lang('admin.from'):{{$table->from}},@lang('admin.to'):{{$table->to}}<br>
                {{\App\Teacher::find($table->teacher)->gname}} {{\App\Teacher::find($table->teacher)->fname}}</td>
                @endforeach
         @for($i=count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Sunday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @elseif(count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Sunday')->get())==0)
    @for($i=count(\App\Timetable::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('week','Sunday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @endif
                        </tr>
                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection
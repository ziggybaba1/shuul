 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{\App\Course::find($id)->title}} @lang('admin.time_table')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
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
                <td>@lang('admin.monday')</td>
@if(count(\App\Timetable::where('class',$id)->where('week','Monday')->get())>0)
@foreach(\App\Timetable::where('class',$id)->where('week','Monday')->get() as $table)
                <td>{{\App\Subject::find($table->subject)->code}}<br>
    <label>@lang('admin.from'):</label>{{$table->from}} <label>@lang('admin.to'):</label>{{$table->to}}<br>
                {{\App\Teacher::find($table->teacher)->gname}} {{\App\Teacher::find($table->teacher)->fname}}</td>
                @endforeach
    @for($i=count(\App\Timetable::where('class',$id)->where('week','Monday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @elseif(count(\App\Timetable::where('class',$id)->where('week','Monday')->get())==0)
    @for($i=count(\App\Timetable::where('class',$id)->where('week','Monday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @endif
                        </tr>
                        <tr>
    <td>@lang('admin.tuesday')</td>
     @if(count(\App\Timetable::where('class',$id)->where('week','Tuesday')->get())>0)
    @foreach(\App\Timetable::where('class',$id)->where('week','Tuesday')->get() as $table)
                <td>{{\App\Subject::find($table->subject)->code}}<br>
   <label>@lang('admin.from'):</label>{{$table->from}} <label>@lang('admin.to'):</label>{{$table->to}}<br>
                {{\App\Teacher::find($table->teacher)->gname}} {{\App\Teacher::find($table->teacher)->fname}}</td>
                @endforeach
     @for($i=count(\App\Timetable::where('class',$id)->where('week','Tuesday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @elseif(count(\App\Timetable::where('class',$id)->where('week','Tuesday')->get())==0)
    @for($i=count(\App\Timetable::where('class',$id)->where('week','Tuesday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @endif
                        </tr>
    <tr>
    <td>@lang('admin.wednessday')</td>
 @if(count(\App\Timetable::where('class',$id)->where('week','Wednessday')->get())>0)
@foreach(\App\Timetable::where('class',$id)->where('week','Wednessday')->get() as $table)
                <td>{{\App\Subject::find($table->subject)->code}}<br>
   <label>@lang('admin.from'):</label>{{$table->from}} <label>@lang('admin.to'):</label>{{$table->to}}<br>
                {{\App\Teacher::find($table->teacher)->gname}} {{\App\Teacher::find($table->teacher)->fname}}</td>
                @endforeach
@for($i=count(\App\Timetable::where('class',$id)->where('week','Wednessday')->get());$i<=9;$i++)
    <td></td>
    @endfor
@elseif(count(\App\Timetable::where('class',$id)->where('week','Wednessday')->get())==0)
    @for($i=count(\App\Timetable::where('class',$id)->where('week','Wednessday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @endif
                        </tr>
                        <tr>
    <td>@lang('admin.thursday')</td>
@if(count(\App\Timetable::where('class',$id)->where('week','Thursday')->get())>0)
@foreach(\App\Timetable::where('class',$id)->where('week','Thursday')->get() as $table)
                <td>{{\App\Subject::find($table->subject)->code}}<br>
    <label>@lang('admin.from'):</label>{{$table->from}} <label>@lang('admin.to'):</label>{{$table->to}}<br>
                {{\App\Teacher::find($table->teacher)->gname}} {{\App\Teacher::find($table->teacher)->fname}}</td>
                @endforeach
@for($i=count(\App\Timetable::where('class',$id)->where('week','Thursday')->get());$i<=9;$i++)
    <td></td>
    @endfor
@elseif(count(\App\Timetable::where('class',$id)->where('week','Thursday')->get())==0)
    @for($i=count(\App\Timetable::where('class',$id)->where('week','Thursday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @endif
                        </tr>
                        <tr>
    <td>@lang('admin.friday')</td>
@if(count(\App\Timetable::where('class',$id)->where('week','Friday')->get())>0)
@foreach(\App\Timetable::where('class',$id)->where('week','Friday')->get() as $table)
                <td>{{\App\Subject::find($table->subject)->code}}<br>
            <label>@lang('admin.from'):</label>{{$table->from}} <label>@lang('admin.to'):</label>{{$table->to}}<br>
                {{\App\Teacher::find($table->teacher)->gname}} {{\App\Teacher::find($table->teacher)->fname}}</td>
                @endforeach
 @for($i=count(\App\Timetable::where('class',$id)->where('week','Friday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @elseif(count(\App\Timetable::where('class',$id)->where('week','Friday')->get())==0)
    @for($i=count(\App\Timetable::where('class',$id)->where('week','Friday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @endif
                        </tr>
                         <tr>
    <td>@lang('admin.saturday')</td>
     @if(count(\App\Timetable::where('class',$id)->where('week','Saturday')->get())>0)
@foreach(\App\Timetable::where('class',$id)->where('week','Saturday')->get() as $table)
                <td>{{\App\Subject::find($table->subject)->code}}<br>
                <label>@lang('admin.from'):</label>{{$table->from}} <label>@lang('admin.to'):</label>{{$table->to}}<br>
                {{\App\Teacher::find($table->teacher)->gname}} {{\App\Teacher::find($table->teacher)->fname}}</td>
                @endforeach
@for($i=count(\App\Timetable::where('class',$id)->where('week','Saturday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @elseif(count(\App\Timetable::where('class',$id)->where('week','Saturday')->get())==0)
    @for($i=count(\App\Timetable::where('class',$id)->where('week','Saturday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @endif
                        </tr>
                         <tr>
    <td>@lang('admin.sunday')</td>
@if(count(\App\Timetable::where('class',$id)->where('week','Sunday')->get())>0)
@foreach(\App\Timetable::where('class',$id)->where('week','Sunday')->get() as $table)
                <td>{{\App\Subject::find($table->subject)->code}}<br>
                    @lang('admin.from'):{{$table->from}},@lang('admin.to'):{{$table->to}}<br>
                {{\App\Teacher::find($table->teacher)->gname}} {{\App\Teacher::find($table->teacher)->fname}}</td>
                @endforeach
         @for($i=count(\App\Timetable::where('class',$id)->where('week','Sunday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @elseif(count(\App\Timetable::where('class',$id)->where('week','Sunday')->get())==0)
    @for($i=count(\App\Timetable::where('class',$id)->where('week','Sunday')->get());$i<=9;$i++)
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
                <script type="text/javascript">
                    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
                </script>
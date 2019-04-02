<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{\App\Course::find(\App\Student::findOrFail($id)->class)->title}} Time Table</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
        <table id="datatabler" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Week Days</th>
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
                                                <th>Week Days</th>
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
                <td>Monday</td>
@if(count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Monday')->get())>0)
@foreach(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Monday')->get() as $table)
                <td>{{\App\Subject::find($table->subject)->code}}<br>
    <label>From:</label>{{$table->from}} <label>To:</label>{{$table->to}}<br>
                {{\App\Teacher::find($table->teacher)->gname}} {{\App\Teacher::find($table->teacher)->fname}}</td>
                @endforeach
    @for($i=count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Monday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @elseif(count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Monday')->get())==0)
    @for($i=count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Monday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @endif
                        </tr>
                        <tr>
    <td>Tuesday</td>
     @if(count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Tuesday')->get())>0)
    @foreach(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Tuesday')->get() as $table)
                <td>{{\App\Subject::find($table->subject)->code}}<br>
   <label>From:</label>{{$table->from}} <label>To:</label>{{$table->to}}<br>
                {{\App\Teacher::find($table->teacher)->gname}} {{\App\Teacher::find($table->teacher)->fname}}</td>
                @endforeach
     @for($i=count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Tuesday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @elseif(count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Tuesday')->get())==0)
    @for($i=count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Tuesday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @endif
                        </tr>
    <tr>
    <td>Wednessday</td>
 @if(count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Wednessday')->get())>0)
@foreach(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Wednessday')->get() as $table)
                <td>{{\App\Subject::find($table->subject)->code}}<br>
   <label>From:</label>{{$table->from}} <label>To:</label>{{$table->to}}<br>
                {{\App\Teacher::find($table->teacher)->gname}} {{\App\Teacher::find($table->teacher)->fname}}</td>
                @endforeach
@for($i=count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Wednessday')->get());$i<=9;$i++)
    <td></td>
    @endfor
@elseif(count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Wednessday')->get())==0)
    @for($i=count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Wednessday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @endif
                        </tr>
                        <tr>
    <td>Thursday</td>
@if(count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Thursday')->get())>0)
@foreach(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Thursday')->get() as $table)
                <td>{{\App\Subject::find($table->subject)->code}}<br>
    <label>From:</label>{{$table->from}} <label>To:</label>{{$table->to}}<br>
                {{\App\Teacher::find($table->teacher)->gname}} {{\App\Teacher::find($table->teacher)->fname}}</td>
                @endforeach
@for($i=count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Thursday')->get());$i<=9;$i++)
    <td></td>
    @endfor
@elseif(count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Thursday')->get())==0)
    @for($i=count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Thursday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @endif
                        </tr>
                        <tr>
    <td>Friday</td>
@if(count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Friday')->get())>0)
@foreach(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Friday')->get() as $table)
                <td>{{\App\Subject::find($table->subject)->code}}<br>
            <label>From:</label>{{$table->from}} <label>To:</label>{{$table->to}}<br>
                {{\App\Teacher::find($table->teacher)->gname}} {{\App\Teacher::find($table->teacher)->fname}}</td>
                @endforeach
 @for($i=count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Friday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @elseif(count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Friday')->get())==0)
    @for($i=count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Friday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @endif
                        </tr>
                         <tr>
    <td>Saturday</td>
     @if(count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Saturday')->get())>0)
@foreach(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Saturday')->get() as $table)
                <td>{{\App\Subject::find($table->subject)->code}}<br>
                <label>From:</label>{{$table->from}} <label>To:</label>{{$table->to}}<br>
                {{\App\Teacher::find($table->teacher)->gname}} {{\App\Teacher::find($table->teacher)->fname}}</td>
                @endforeach
@for($i=count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Saturday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @elseif(count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Saturday')->get())==0)
    @for($i=count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Saturday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @endif
                        </tr>
                         <tr>
    <td>Sunday</td>
@if(count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Sunday')->get())>0)
@foreach(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Sunday')->get() as $table)
                <td>{{\App\Subject::find($table->subject)->code}}<br>
                    from:{{$table->from}},to:{{$table->to}}<br>
                {{\App\Teacher::find($table->teacher)->gname}} {{\App\Teacher::find($table->teacher)->fname}}</td>
                @endforeach
         @for($i=count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Sunday')->get());$i<=9;$i++)
    <td></td>
    @endfor
    @elseif(count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Sunday')->get())==0)
    @for($i=count(\App\Timetable::where('class',\App\Student::findOrFail($id)->class)->where('week','Sunday')->get());$i<=9;$i++)
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
    $(document).ready(function() {
$("#datatabler").DataTable();
    });
</script> 
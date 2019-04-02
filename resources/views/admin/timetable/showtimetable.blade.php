 <div id="contenttimetable">
 <style type="text/css">
     label{
        font-weight: bold;
     }
 </style>
 <div class="row">
                    <div class="col-12">
                        <div class="card">
                             <div class="card-body">
        <form id="posttimetable">
             {{ csrf_field() }}
    <div class="row">
        <div class="col-md-2">

            <select required name="week" class="form-control">
                <option value="">@lang('admin.select') @lang('admin.day')</option>
                <option value="Monday">@lang('admin.monday')</option>
                <option value="Tuesday">@lang('admin.tuesday')</option>
                <option value="Wednessday">@lang('admin.wednessday')</option>
                <option value="Thursday">@lang('admin.thursday')</option>
                <option value="Friday">@lang('admin.friday')</option>
                <option value="Saturday">@lang('admin.saturday')</option>
                <option value="Sunday">@lang('admin.sunday')</option>
            </select>
        </div>
         <div class="col-md-2">
            <select required name="subject" class="form-control select2">
                <option value="">@lang('admin.select') @lang('admin.subject')</option>
                @foreach(\App\Subject::all() as $subject)
                <option value="{{$subject->id}}">{{$subject->title}}</option>
                @endforeach
            </select>
        </div>
         <div class="col-md-2">
            <select required name="teacher" class="form-control select2">
                <option value="">@lang('admin.select') @lang('admin.teacher')</option>
                @foreach(\App\Teacher::where('role','teacher')->where('status','0')->get() as $class)
                <option value="{{$class->id}}">{{$class->gname}} {{$class->fname}}</option>
                     @endforeach
            </select>
        </div>
         <div class="col-md-2">
<input id="" required type="text" placeholder="@lang('admin.from')" class="form-control timepickero" name="from">
        </div>
         <div class="col-md-2">
           <input required type="text" placeholder="@lang('admin.to')" class="form-control timepickero" name="to">
        </div>
         <div class="col-md-2">
           <input required type="text" readonly class="form-control" value="{{\mt_rand(0001, 9999)}}" name="number">
        </div>
    </div>
   <br>
     <div class="row">
        
        <div class="col-md-4"></div>
        <div class="col-md-4">
           <input type="submit" name="" class="btn btn-primary btn-block btn-sm" value="@lang('admin.add') @lang('admin.time_table')">
        </div>
         <div class="col-md-4"></div>
        
     </div>
     </form>
     <br>
 </div>
                        </div>
                    </div>
</div>
 
    <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{\App\Course::find($id)->title}} @lang('admin.time_table')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="table-responsive m-t-40">
        <table id="example230" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
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
 </div>
        <script type="text/javascript">
            jQuery(document).ready(function() {
             $(".select2").select2();
         });
            $('#example230').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
        $('.timepickero').bootstrapMaterialDatePicker({
       format: 'HH:mm',
        time: true,
        date: false
    });
        </script>
        <script type="text/javascript">
    $("#posttimetable").submit(function(e) {
  var formDatar = new FormData(this);
   jQuery('#contenttimetable').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:50px;" /></div>');
  $.ajax({
            url     : '{{url('')}}/timetable/new/create/{{$id}}',
            type    : 'POST',
            data    : formDatar,
    success: function (data) {
        jQuery('#contenttimetable').html(data);
      },
      error:function(data){
         alert(data);
      },
       cache: false,
        contentType: false,
        processData: false
 });
   e.preventDefault();
});
</script> 
              
 <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-body">
                            <h4 class="card-title">{{\App\Forum::find($id)->title}} @lang('admin.forum_perm')</h4>
                            <h6 class="card-subtitle"></h6>
 <form action="{{url('')}}/edit/old/forum/{{$id}}" method="post">
 	 {{ csrf_field() }}
 <div class="table-responsive m-t-40">
 	  <table id="exampler" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            	
                                                <th>@lang('admin.staff')</th>
                                                <th>@lang('admin.student')</th>
                                                <th>@lang('admin.parent')</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               
                                                <th>@lang('admin.staff')</th>
                                                <th>@lang('admin.student')</th>
                                                <th>@lang('admin.parent')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        	<td>
                                       <table>
                            @foreach(\App\Member::where('forum_id',$id)->where('type','staff')->get() as $staff)
                                        		<tr>
                                        			<td>
                                        	<div class="checkbox">
                 <input value="{{$staff->user_id}}" name="staff[]" checked type="checkbox" id="staff{{$loop->iteration}}" >
                       <label for="staff{{$loop->iteration}}">{{\App\User::find($staff->user_id)->name}}</label>
                                             </div>
                                         </td>
                                         </tr>
                                   @endforeach
         @foreach(\App\Teacher::where('status','0')->get() as $staffn)
        @if(count(\App\Member::where('forum_id',$id)->where('user_id',$staffn->user_table)->get())>0)
 @if(\App\Member::where('forum_id',$id)->where('user_id',$staffn->user_table)->first()->user_id==$staffn->user_table)
 @endif
 @else
                                     <tr>
                                        			<td>
                                        	<div class="checkbox">
                 <input value="{{$staffn->user_table}}" name="staff[]"  type="checkbox" id="staffn{{$loop->iteration}}" >
                       <label for="staffn{{$loop->iteration}}">{{\App\User::find($staffn->user_table)->name}}</label>
                                             </div>
                                         </td>
                                         </tr>
                                  @endif
                                   @endforeach
                                   </table>
                                        	</td>
                                        	<td>
                                        		<table>
                            @foreach(\App\Member::where('forum_id',$id)->where('type','student')->get() as $student)
                                        		<tr>
                                        <td>
                                        	<div class="checkbox">
                 <input value="{{$student->user_id}}" name="student[]" checked type="checkbox" id="student{{$loop->iteration}}" >
                       <label for="student{{$loop->iteration}}">{{\App\User::find($student->user_id)->name}}</label>
                                             </div>
                                         </td>
                                         </tr>
                                   @endforeach
        @foreach(\App\Student::where('status','0')->get() as $studentn)
        @if(count(\App\Member::where('forum_id',$id)->where('user_id',$studentn->data_id)->get())>0)
 @if(\App\Member::where('forum_id',$id)->where('user_id',$studentn->data_id)->first()->user_id==$studentn->data_id)
 @endif
 @else
                                     <tr>
                                        			<td>
                                        	<div class="checkbox">
                 <input value="{{$studentn->data_id}}" name="student[]"  type="checkbox" id="studentn{{$loop->iteration}}" >
                       <label for="studentn{{$loop->iteration}}">{{\App\User::find($studentn->data_id)->name}}</label>
                                             </div>
                                         </td>
                                         </tr>
                                  @endif
                                   @endforeach
                                   </table>
                                        	</td>
                                      <td>
                                        		<table>
                            @foreach(\App\Member::where('forum_id',$id)->where('type','parent')->get() as $parent)
                                        		<tr>
                                        <td>
                                        	<div class="checkbox">
                 <input value="{{$parent->user_id}}" name="parent[]" checked type="checkbox" id="parent{{$loop->iteration}}" >
                       <label for="parent{{$loop->iteration}}">{{\App\User::find($parent->user_id)->name}}</label>
                                             </div>
                                         </td>
                                         </tr>
                                   @endforeach
        @foreach(\App\Parenting::where('status','0')->get() as $parentn)
  @if(count(\App\Member::where('forum_id',$id)->where('user_id',$parentn->user_id)->get())>0)
 @if(\App\Member::where('forum_id',$id)->where('user_id',$parentn->user_id)->first()->user_id==$parentn->user_id)
 @endif
 @else
                                     <tr>
                                        			<td>
                                        	<div class="checkbox">
                 <input name="parent[]" value="{{$parentn->user_id}}" type="checkbox" id="$parentn{{$loop->iteration}}" >
                       <label for="$parentn{{$loop->iteration}}">{{\App\User::find($parentn->user_id)->name}}</label>
                                             </div>
                                         </td>
                                         </tr>
                                  @endif
                                   @endforeach
                                   </table>
                                        	</td>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="@lang('admin.submit')" name="">	
                                    </div>
                                    </form>
 </div>
                        </div>
                    </div>
 <script type="text/javascript">
 	$('#exampler').DataTable();
 </script>
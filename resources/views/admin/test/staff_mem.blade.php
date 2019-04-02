 <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-body">
                            <h4 class="card-title"> (@if(\App\Batch::find($id)->batch=='1')
   Batch A
   @elseif(\App\Batch::find($id)->batch=='2')
    Batch B
     @elseif(\App\Batch::find($id)->batch=='3')
    Batch C
     @elseif(\App\Batch::find($id)->batch=='4')
    Batch D
 @elseif(\App\Batch::find($id)->batch=='5')
    Batch E
 @elseif(\App\Batch::find($id)->batch=='6')
    Batch F
 @elseif(\App\Batch::find($id)->batch=='7')
    Batch G
 @elseif(\App\Batch::find($id)->batch=='8')
    Batch H
    @endif) @lang('admin.batch_stperm')</h4>
                            <h6 class="card-subtitle">{{\App\Batch::find($id)->subject}}</h6>
 <form action="{{url('')}}/edit/batch/user/{{$id}}" method="post">
 	 {{ csrf_field() }}
 <div class="table-responsive m-t-40">
 	  <table id="exampler" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            <th>#</th>
                                                <th>@lang('admin.staff')</th>
                                            
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               
                                              <th>#</th>
                                                <th>@lang('admin.staff')</th>
                                               
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                             <input name="type" style="display: none;" type="text" required value="2"  class="form-control" >
                            @foreach(\App\Teacher::where('status','0')->get() as $staff)
                        @if(count(\App\Assign::where('student_id',$staff->id)->where('batch_id',$id)->get())>0)
                                        		<tr>
                                                    <td>{{$loop->iteration}}</td>
                                        			<td>
                                        	<div class="checkbox">
                 <input value="{{$staff->id}}" name="staff[]" checked type="checkbox" id="staff{{$loop->iteration}}" >
                       <label for="staff{{$loop->iteration}}">{{$staff->user_id}} {{$staff->gname}} {{$staff->fname}}</label>
                                             </div>
                                         </td>
                                         </tr>
                                         @endif
                     @if(count(\App\Assign::where('batch_id',$id)->where('student_id',$staff->id)->get())==0)
                                         <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>
                                            <div class="checkbox">
                 <input value="{{$staff->id}}" name="staff[]" type="checkbox" id="staff{{$loop->iteration}}" >
                       <label for="staff{{$loop->iteration}}">{{$staff->user_id}} {{$staff->gname}} {{$staff->fname}}</label>
                                             </div>
                                         </td>
                                         </tr>
                                         @endif
                                   @endforeach
        
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
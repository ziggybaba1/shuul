@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.book') @lang('admin.inventory')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.book') @lang('admin.inventory')</li>
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
<div id="showresultshere">
  <div class="row">
     <div class="col-12">
      <div class="card">
                            <div class="card-body">
                            </div>
                          </div>
                        </div>
  </div>
 <div class="row">
                    <div class="col-12">
                         @if (session('message'))
                  <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Book gvhbbjnj Issued Export</h4>
                          <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                           <div class="pull-left">
                  <button data-toggle="modal" data-target=".bs-example-modal-st" class="btn btn-primary btn-bg">Add Staff Book Issued</button>
                             </div>
                             <div class="pull-right">
                  <button data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-primary btn-bg">Add Student Book Issued</button>
                             </div>
                                <div class="table-responsive m-t-40">
       <table id="example23" class="display nowrap table table-hover table-striped table-bordered " cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Collector</th>
                                                <th>Type</th>
                                                <th>Book Issued</th>
                                                <th>Issue Date</th>
                                                <th>Return Date</th>
                                                <th>Status</th>
                                                <th>Sign</th>
                                                <th>Change Status</th>
                                                <th>Delete</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                               <th>Collector</th>
                                                <th>Type</th>
                                                <th>Book Issued</th>
                                                <th>Issue Date</th>
                                                <th>Return Date</th>
                                                <th>Status</th>
                                                <th>Sign</th>
                                                <th>Change Status</th>
                                                <th>Delete</th> 
                                            </tr>
                                        </tfoot>
                      <tbody>
                @foreach(\App\Borrow::latest()->get() as $batch)
                        <tr>
                      @if($batch->dom1=='staff')
                      <td>{{\App\Teacher::find($batch->collector)->user_id}}</td>
                      @else
                       <td>{{\App\Student::find($batch->collector)->user_id}}</td>
                       @endif
                  @if($batch->dom1=='staff')
                      <td>{{\App\Teacher::find($batch->collector)->gname}} {{\App\Teacher::find($batch->collector)->fname}}</td>
                      @else
                       <td>{{\App\Student::find($batch->collector)->gname}} {{\App\Student::find($batch->collector)->fname}}</td>
                       @endif
                       <td>{{$batch->dom1}}</td>
                      <td>{{\App\Inventory::find($batch->book)->title}}</td>
                      <td>{{\Carbon\Carbon::parse($batch->idate)->toFormattedDateString()}}</td>
                      <td>{{\Carbon\Carbon::parse($batch->rdate)->toFormattedDateString()}}</td>
            @if($batch->status==='Pending Return'||$batch->status==='Damaged')
                      <td><span class="btn btn-warning">{{$batch->status}}</span></td>
            @elseif($batch->status==='Returned')
             <td><span class="btn btn-success">{{$batch->status}}</span></td>
            @endif
                      <td>{{$batch->sign}}</td>
<td><button onclick="showAjaxModal('{{url('')}}/edit/borrow/batch/{{$batch->id}}')" class="btn btn-sm btn-default btn-block">Update</button></td>
<td><button onclick="deletebook('{{$batch->id}}')" class="btn btn-sm btn-danger btn-block"><i class="fa fa-trash"></i>Delete</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
                               
        </div>
      </div>
    </div>
</div>
</div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">{{\App\Provider::first()->name}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                      <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">Add Student Book Issued</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/issue/student/book" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Select Collector</label>
                            <select style="width: 100%;" class="form-control select2" name="student">
                              <option>Select Student</option>
                  @foreach(\App\Student::where('status','0')->get() as $student)
                              <option value="{{$student->id}}">{{$student->user_id}} {{$student->gname}} {{$student->fname}}</option>
                              @endforeach
                            </select>
                            </div>   
                            </div>
                                    <div class="col-md-6">
                                <div class="form-group">
                                  <label>Book Issued</label>
                           <select style="width: 100%;" class="form-control select2" name="book">
                              <option>Select Book</option>
                  @foreach(\App\Inventory::all() as $bookn)
                              <option value="{{$bookn->id}}">{{$bookn->title}}</option>
                              @endforeach
                            </select>
                                  </div>   
                                </div>
                              </div>
                       <div class="row">
                                        <div class="col-md-6">
                                           <div class="form-group">
                                         <label>Issued Date</label>
                            <input type="text" class="form-control mdate" name="idate">
                                      </div>   
                                        </div>
                        <div class="col-md-6">
                                      <div class="form-group">
                          <label>Return Date</label>
                                        <input type="text" class="form-control mdate" name="rdate">
                                      </div>   
                                        </div>
                                      </div>
                            
                                     <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block" value="Submit">
                                     </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                  </form>
                        </div>
                    </div>
                </div>
            </div>
                          </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
<div class="modal fade bs-example-modal-st" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">{{\App\Provider::first()->name}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                              <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">Add Staff Book Issued</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/issue/staff/book" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Select Collector</label>
                            <select style="width: 100%;" class="form-control select2" name="staff">
                              <option>Select Staff</option>
@foreach(\App\Teacher::where('status','0')->get() as $student)
                              <option value="{{$student->id}}">{{$student->user_id}} {{$student->gname}} {{$student->fname}}</option>
@endforeach
                            </select>
                            </div>   
                            </div>
                                    <div class="col-md-6">
                                <div class="form-group">
                                  <label>Book Issued</label>
                           <select style="width: 100%;" class="form-control select2" name="book">
                              <option>Select Book</option>
                  @foreach(\App\Inventory::all() as $book)
                              <option value="{{$book->id}}">{{$book->title}}</option>
                  @endforeach
                           </select>
                                  </div>   
                                </div>
                              </div>
                       <div class="row">
                                        <div class="col-md-6">
                                           <div class="form-group">
                                         <label>Issued Date</label>
                            <input type="text"  class="form-control mdate" name="idate">
                                      </div>   
                                        </div>
                        <div class="col-md-6">
                                      <div class="form-group">
                          <label>Return Date</label>
                                        <input type="text" class="form-control mdate" name="rdate">
                                      </div>   
                                        </div>
                                      </div>
                            
                                     <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block" value="Submit">
                                     </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                  </form>
                        </div>
                    </div>
                </div>
            </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">{{\App\Provider::first()->name}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                              <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">Add Book Inventory</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/add/new/book" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                                      <div class="form-group">
                                         <label>Book Title</label>
                                        <input type="text" class="form-control" name="title">
                                      </div>   
                            </div>
                                    <div class="col-md-6">
                                <div class="form-group">
                                  <label>Book Author</label>
                                <input type="text" class="form-control" name="author">
                                  </div>   
                                </div>
                              </div>
                       <div class="row">
                                        <div class="col-md-6">
                                           <div class="form-group">
                                         <label>Book Edition</label>
                             <input type="text" class="form-control" name="edition">
                                      </div>   
                                        </div>
                        <div class="col-md-6">
                                      <div class="form-group">
                          <label>Book Category</label>
                  <select style="width: 100%;" class="form-control select2" name="category">
                              <option>Select Category</option>
                  @foreach(\App\Subjecttype::all() as $subject)
                              <option value="{{$subject->title}}">{{$subject->title}}</option>
                              @endforeach
                            </select>
                                      </div>   
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                           <div class="form-group">
                                         <label>Book Total</label>
                             <input type="number" class="form-control" name="total">
                                      </div>   
                                        </div>
                                        <div class="col-md-6">
                                           <div class="form-group">
                                         <label>Class</label>
                               <select style="width: 100%;" class="form-control select2">
                              <option>Select Class</option>
                  @foreach(\App\Course::all() as $class)
                              <option value="{{$class->title}}">{{$class->title}}</option>
                              @endforeach
                            </select>
                                      </div>   
                                        </div>
                                      </div>
                            
                                     <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block" value="Add Inventory">
                                     </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                  </form>
                        </div>
                    </div>
                </div>
            </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
<script type="text/javascript">
              function deletebook(id)
              {
                if(confirm('Press Ok to confirm delete!!!')){ 
                $.get('{{url('')}}/delete/borrow/'+id,function(data)
                {
                if(data==0){
                  swal('Book Issued has been deleted Successfully', "clicked the button to continue!", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=27');
                }
            else{
                     swal("Error in deleting Book Issued, It can not be deleted!", "clicked the button to continue!", "error");
                    }    
                });
            }
              }
              
          </script>
          <script type="text/javascript">
        
  </script>
@endsection
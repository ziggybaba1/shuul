 @extends('layouts.admin')
@section('content')
<style type="text/css">
 .dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 3px 0;
    margin: 2px 0 0;
    list-style: none;
    font-size: 12px;
    background-color: #ffffff;
    border: 1px solid #cccccc;
    border: 1px solid #ebebeb;
    border-radius: 3px;
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    box-shadow: none;
    background-clip: padding-box;
}
</style>
               <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Enroll Student</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">Home</a></li>
                            <li class="breadcrumb-item active">enroll-student</li>
                        </ol>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                              <h5 class="text-themecolor">Current Session: {{\App\Session::latest()->first()->session}} </h5><br>
                            <h5 class="text-themecolor">  ({{\App\Session::latest()->first()->terms}} Term)</h5>
                        </div>
                    </div>
                </div>
<div class="row">
     <div class="col-12">
      <div class="card">
                            <div class="card-body">
   <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Active Student&nbsp; &nbsp; &nbsp; &nbsp;  <span class="badge badge-warning pull-right">{{count(\App\Enroll::where('status','1')->get())}}</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Pending/Suspended Student&nbsp; &nbsp; &nbsp; &nbsp; <span class="badge badge-success pull-right">{{count(\App\Enroll::where('status','0')->orWhere('status','2')->get())}}</span></a> </li>
                              </ul>
                            </div>
                          </div>
                        </div>
  </div>
 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
  <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                <h4 class="card-title">Active Student Enrolled List</h4>
                                <h6 class="card-subtitle"></h6>
                                 <div class="pull-left">
                               
                             </div>
                              <div class="pull-left">
                                 <button data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-primary btn-bg">Enroll Internal Student</button>
                             </div>
                            <div class="pull-right">
                                 <button data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-primary btn-bg">Enroll External Student</button>
                             </div>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                               <th>Type</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Enrolled Course</th>
                                                <th>Subscription</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>Name</th>
                                                <th>Type</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Enrolled Course</th>
                                                <th>Subscription</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Enroll::where('status','1')->get() as $class)
                                            <tr>
    <td>
      @if($class->type=='internal')
      {{\App\Student::find($class->user_id)->user_id}} {{\App\Student::find($class->user_id)->gname}} {{\App\Student::find($class->user_id)->fname}}
      @elseif($class->type=='external')
      {{$class->name}}
      @endif
    </td>
                                                <td>{{$class->type}}</td>
                                                <td>{{\Carbon\Carbon::parse($class->date)->toFormattedDateString()}}</td>
                <td>{{\Carbon\Carbon::parse($class->date)->addMonth($class->plan)->toFormattedDateString()}}</td>
                                                <td>
                                                   <ul>
                        @foreach(\App\Subscription::where('enroll_id',$class->id)->get() as $enroll)
                                          <li>{{\App\Work::find($enroll->course_id)->title}}</li>
                                          @endforeach
                                                  </ul>
                                                </td>
                                                <td>
                              @if($class->plan=='1')
                                                Monthly
                                @elseif($class->plan=='3')
                                Quarterly
                                 @elseif($class->plan=='12')
                                Yearly
                                @endif

                                                </td>
                                                <td>
                                    @if($class->status=='1')
                                                Active
                                @elseif($class->status=='0')
                                Pending
                                 @elseif($class->status=='2')
                                Suspended
                                @endif
                                                </td>
                    <td>
 <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-settings"></i>
                                    </button>
                                    <div class="dropdown-menu animated flipInX">
                                       <a onclick="showAjaxModal('{{url('')}}/manage/view/course/{{$class->id}}')" class="dropdown-item" href="javascript:void(0)">View Records</a>
                                     <a onclick="showAjaxModal('{{url('')}}/manage/subscription/course/{{$class->id}}')" class="dropdown-item" href="javascript:void(0)">Change Status</a>
                                        <a onclick="showAjaxModal('{{url('')}}/manage/enroll/student/{{$class->id}}')" class="dropdown-item" href="javascript:void(0)">Edit</a>
                                        <a class="dropdown-item" onclick="deletestudent('{{$class->id}}')" href="javascript:void(0)">Delete</a>
                                    </div>
                                </div>
                    </td>
                                            </tr>
                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
        <div class="tab-pane" id="profile" role="tabpanel">
          <h4 class="card-title">Pending/Suspended Student Enrolled List</h4>
                                <h6 class="card-subtitle"></h6>
                                 <div class="pull-left">
                               
                             </div>
                                <div class="table-responsive m-t-40">
                                    <table id="example24" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                               <th>Type</th>
                                                <th>Date Added</th>
                                                <th>Enrolled Course</th>
                                                <th>Subscription</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>Name</th>
                                                <th>Type</th>
                                                <th>Date Added</th>
                                                <th>Enrolled Course</th>
                                                <th>Subscription</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Enroll::where('status','0')->orWhere('status','2')->get() as $class)
                                            <tr>
    <td>
    @if($class->type=='internal')
      {{\App\Student::find($class->user_id)->user_id}} {{\App\Student::find($class->user_id)->gname}} {{\App\Student::find($class->user_id)->fname}}
      @elseif($class->type=='external')
      {{$class->name}}
      @endif
    </td>
                                                <td>{{$class->type}}</td>
                                                <td>{{\Carbon\Carbon::parse($class->created_at)->toFormattedDateString()}}</td>
                                                <td>
                                                   <ul>
                        @foreach(\App\Subscription::where('enroll_id',$class->id)->get() as $enroll)
                                          <li>{{\App\Work::find($enroll->course_id)->title}}</li>
                                          @endforeach
                                                  </ul>
                                                </td>
                                                <td>
                              @if($class->plan=='1')
                                                Monthly
                                @elseif($class->plan=='3')
                                Quarterly
                                 @elseif($class->plan=='12')
                                Yearly
                                @endif

                                                </td>
                                                <td>
                                    @if($class->status=='1')
                                                Active
                                @elseif($class->status=='0')
                                Pending
                                 @elseif($class->status=='2')
                                Suspended
                                @endif
                                                </td>
                    <td>
 <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-settings"></i>
                                    </button>
                                    <div class="dropdown-menu animated flipInX">

                                       <a onclick="showAjaxModal('{{url('')}}/manage/subscription/course/{{$class->id}}')" class="dropdown-item" href="javascript:void(0)">Change Status</a>
                                        <a onclick="showAjaxModal('{{url('')}}/manage/lesson/course/{{$class->id}}')" class="dropdown-item" href="javascript:void(0)">Edit</a>
                                        <a class="dropdown-item" onclick="deletelesson('{{$class->id}}')" href="javascript:void(0)">Delete</a>
                                    </div>
                                </div>
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
<h4 class="card-title">New Internal Student Enrollment</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/enroll/staff/course" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Select Select</label>
                            <select style="width: 100%;" class="form-control select2" name="staff">
                    @foreach(\App\Student::all() as $staff)
                              <option value="{{$staff->id}}">{{$staff->user_id}} {{$staff->gname}} {{$staff->fname}}</option>
                    @endforeach
                            </select>
                            </div>
                            </div>
                             <div class="col-md-6"> 
                            <div class="form-group">
                              <label>Select Course</label>
                          <select style="width: 100%;" multiple class="form-control select2" name="course[]">
                        @foreach(\App\Work::all() as $work)
                              <option value="{{$work->id}}">{{$work->title}}</option>
                    @endforeach
                            </select>
                            </div> 
                        </div>
                    </div>
            <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label>Choose Plan</label>
                            <select style="width: 100%;" class="form-control select2" name="plan">
                        @foreach(\App\Plan::all() as $plan)
                              <option value="{{$plan->id}}">{{$plan->name}}</option>
                    @endforeach
                            </select>
                            </div>
                        </div>
                         <div class="col-md-6">
                             <div class="form-group">
                              <label>Activate User</label>
                           <select style="width: 100%;" class="form-control select2" name="status">
                               <option value="0">Pending</option>
                            </select>
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
<h4 class="card-title">New External Student Enrollment</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/enroll/student/course" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Student Name</label>
                      <input type="text" class="form-control"  name="name">
                            </div>
                            </div>
                             <div class="col-md-6">
                            <div class="form-group">
                              <label>Student Email</label>
                      <input type="email" class="form-control"  name="email">
                            </div>
                            </div>    
                    </div>
            <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Student Username</label>
                      <input type="text" class="form-control"  name="username">
                            </div>
                            </div>
                             <div class="col-md-6">
                            <div class="form-group">
                              <label>Student Password</label>
                      <input type="text" class="form-control"  name="password">
                            </div>
                            </div>
                             
                    </div>
            <div class="row">
              <div class="col-md-6"> 
                            <div class="form-group">
                              <label>Select Course</label>
                          <select style="width: 100%;" multiple class="form-control select2" name="course[]">
                        @foreach(\App\Work::all() as $work)
                              <option value="{{$work->id}}">{{$work->title}}</option>
                    @endforeach
                            </select>
                            </div> 
                        </div>
                        <div class="col-md-4">
                             <div class="form-group">
                              <label>Choose Plan</label>
                            <select style="width: 100%;" class="form-control select2" name="plan">
                        @foreach(\App\Plan::all() as $plan)
                              <option value="{{$plan->id}}">{{$plan->name}}</option>
                    @endforeach
                            </select>
                            </div>
                        </div>
                         <div class="col-md-2">
                             <div class="form-group">
                              <label>Activate User</label>
                           <select style="width: 100%;" class="form-control select2" name="status">
                               <option value="0">Pending</option>
                            </select>
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
                  <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
     <script type="text/javascript">
              function deletestudent(id)
              {
                if(confirm('Press Ok to confirm delete!!!')){ 
                $.get('{{url('')}}/delete/enroll/'+id,function(data)
                {
                if(data==0){
                  swal('Enrolled Student has been deleted Successfully', "clicked the button to continue!", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=30');
                }
            else{
                     swal("Error in deleting Lesson, It can not be deleted!", "clicked the button to continue!", "error");
                    }    
                });
            }
              }
              $(function () {
    setInterval(function(){
 document.getElementById('showarean').value =$(".mymce").val();
   }, 1000);
});
          </script>
                @endsection
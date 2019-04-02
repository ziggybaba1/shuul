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
                        <h3 class="text-themecolor">Course Instructors</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">Home</a></li>
                      <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=31">All Instructor</a></li>
                            <li class="breadcrumb-item active">{{\App\Instructor::find($id)->name}} Courses</li>
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
                         @if (session('message'))
                  <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card">
                            <div class="card-body">
                              <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                <h4 class="card-title">Course Instructor Export</h4>
                          <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <div id="showresultshere">
     <table id="example23" class="display nowrap table table-hover table-striped table-bordered " cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Course Title</th>
                                                <th>Level</th>
                                                <th>Active Student</th>
                                                <th>Completed Student</th>
                                                <th>Option</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>ID</th>
                                                <th>Course Title</th>
                                                <th>Level</th>
                                                <th>Active Student</th>
                                                <th>Completed Student</th>
                                                <th>Option</th>  
                                            </tr>
                                        </tfoot>
                      <tbody>
                @foreach(\App\Work::where('idn',\App\Instructor::find($id)->user_id)->latest()->get() as $batch)
                        <tr>
                        <td>{{$loop->iteration}}</td>
                       <td>{{$batch->title}}</td>
                      <td>{{$batch->level}}</td>
        <td>{{count(\App\Subscription::where('course_id',$batch->id)->where('status','1')->get())}}</td>
        <td>{{count(\App\Subscription::where('course_id',$batch->id)->where('status','2')->get())}}</td>
<td>
  <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-settings"></i>
                                    </button>
                                    <div class="dropdown-menu animated flipInX">
                                       <a onclick="showAjaxModal('{{url('')}}/view/active/student/{{$batch->id}}')" class="dropdown-item" href="javascript:void(0)">Active Student</a>
                                        <a onclick="showAjaxModal('{{url('')}}/view/completed/student/{{$batch->id}}')" class="dropdown-item" href="javascript:void(0)">Completed Student</a>
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
<h4 class="card-title">Add Internal Staff as Instructor </h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/add/internal/instructor" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label>Select Staff</label>
                    <select style="width: 100%;" class="form-control select2" name="staff">
            @foreach(\App\Teacher::all() as $staff)
                      <option value="{{$staff->id}}">{{$staff->gname}} {{$staff->fname}}</option>
              @endforeach
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
<h4 class="card-title">Add External Instructor </h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/add/external/instructor" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Name</label>
                      <input type="text" class="form-control"  name="name">
                            </div>
                            </div>
                             <div class="col-md-6">
                            <div class="form-group">
                              <label>Email</label>
                      <input type="email" class="form-control"  name="email">
                            </div>
                            </div>    
                    </div>
            <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Username</label>
                      <input type="text" class="form-control"  name="username">
                            </div>
                            </div>
                             <div class="col-md-6">
                            <div class="form-group">
                              <label>Password</label>
                      <input type="text" class="form-control"  name="password">
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
                                <script type="text/javascript">
              function deletecategory(id)
              {
                if(confirm('Press Ok to confirm delete!!!')){ 
                $.get('{{url('')}}/delete/category/'+id,function(data)
                {
                if(data==0){
                  swal('Category has been deleted Successfully', "clicked the button to continue!", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=28');
                }
            else{
                     swal("Error in deleting Category, It can not be deleted!", "clicked the button to continue!", "error");
                    }    
                });
            }
              }
          </script>
@endsection
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
                            <li class="breadcrumb-item active">course-instructors</li>
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
                          <div class="pull-left">
                  <button data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-primary btn-bg">Add External Instructor</button>
                             </div>
                           <div class="pull-right">
                  <button data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-primary btn-bg">Add Internal Instructor</button>
                             </div>
                                <div class="table-responsive m-t-40">
                                    <div id="showresultshere">
     <table id="example23" class="display nowrap table table-hover table-striped table-bordered " cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Instructor Name</th>
                                                <th>Type</th>
                                                <th>Total Active Course</th>
                                                <th>Total Pending Student</th>
                                                <th>Option</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Instructor Name</th>
                                                <th>Type</th>
                                                <th>Total Active Course</th>
                                                <th>Total Pending Student</th>
                                                <th>Option</th> 
                                            </tr>
                                        </tfoot>
                      <tbody>
                @foreach(\App\Instructor::latest()->get() as $batch)
                        <tr>
                        <td>{{$loop->iteration}}</td>
                       <td>{{$batch->name}}</td>
                      <td>{{$batch->type}}</td>
                <td>{{count(\App\Work::where('idn',$batch->user_id)->where('status','1')->get())}}</td>
                <td>{{count(\App\Work::where('idn',$batch->user_id)->where('status','0')->get())}}</td>
<td>
  <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-settings"></i>
                                    </button>
                                    <div class="dropdown-menu animated flipInX">

                                       <a class="dropdown-item" href="{{url('')}}/view/instructor/course?instructor={{$batch->id}}">View Board</a>
                                        <a class="dropdown-item" onclick="deletelesson('{{$batch->id}}')" href="javascript:void(0)">Delete</a>
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
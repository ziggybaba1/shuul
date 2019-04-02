 @extends('layouts.admin')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Enroll Plan</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">Home</a></li>
                            <li class="breadcrumb-item active">enroll-plan</li>
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
                                <h4 class="card-title">Enrollment Plan List</h4>
                                <h6 class="card-subtitle"></h6>
                                 <div class="pull-left">
                               
                             </div>
                            <div class="pull-right">
                                 <button data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-primary btn-bg">Add Plan</button>
                             </div>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Plan ID</th>
                                                <th>Plan Name</th>
                                                <th>Duration</th>
                                                <th>Price</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>#</th>
                                                <th>Plan ID</th>
                                                <th>Plan Name</th>
                                                <th>Duration</th>
                                                <th>Price</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Plan::all() as $class)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$class->token}}</td>
                                                <td>{{$class->name}}</td>
                                                <td>{{$class->duration}}</td>
                                                <td>{{$class->price}}</td>
                                                <td>{!!$class->description!!}</td>
                    <td>
 <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-settings"></i>
                                    </button>
                                    <div class="dropdown-menu animated flipInX">
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
<h4 class="card-title">New Enrollment Plan </h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/add/enrollment/plan" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Enrollment ID</label>
                             <input type="text" value="{{\Carbon\Carbon::now()->format('di').\mt_rand(00, 99)}}" class="form-control" name="token">
                            </div>
                            </div>
                            <div class="col-md-6">
                             <div class="form-group">
                              <label>Enrollment Name</label>
                             <input type="text" class="form-control" name="name">
                            </div>
                        </div>  
                    </div>
            <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label>Price {{\App\Currency::find(\App\Setting::first()->currency)->symbol}}</label>
                             <input type="text" class="form-control" name="price">
                            </div>
                            </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                              <label>Duration</label>
                            <select style="width: 100%;" class="form-control select2" name="duration">
                       <option value="1">Monthly</option>
                       <option value="3">Quarterly</option>
                       <option value="12">Yearly</option>
                            </select>
                            </div> 
                        </div>
                            </div>
                           
                         <div class="row">
                           <div class="col-md-12">
                             <div class="form-group">
                              <label>Enrollment Plan Description</label>
                    <textarea class="form-control mymce" id="inter"></textarea>
                     <textarea style="display: none;" id="showarean" name="description"></textarea>
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
              function deletelesson(id)
              {
                if(confirm('Press Ok to confirm delete!!!')){ 
                $.get('{{url('')}}/delete/lesson/'+id,function(data)
                {
                if(data==0){
                  swal('Lesson has been deleted Successfully', "clicked the button to continue!", "success");
                    window.location.assign('{{url('')}}/manage/lesson/course?course=1');
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
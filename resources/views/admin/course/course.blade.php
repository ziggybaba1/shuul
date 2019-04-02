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
                        <h3 class="text-themecolor">Courses</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">Home</a></li>
                            <li class="breadcrumb-item active">course</li>
                        </ol>
                    </div>
                     <div class="col-md-6 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                              <h5 class="text-themecolor">Current Session: {{\App\Session::latest()->first()->session}} </h5><br>
                            <h5 class="text-themecolor">  ({{\App\Session::latest()->first()->terms}} Term)</h5>
                        </div>
                    </div>
                </div>
<div id="showresultshere">
  <div class="row">
     <div class="col-12">
      <div class="card">
                            <div class="card-body">
   <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Active Course&nbsp; &nbsp; &nbsp; &nbsp;  <span class="badge badge-warning pull-right">{{count(\App\Work::where('status','1')->get())}}</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Pending Course&nbsp; &nbsp; &nbsp; &nbsp; <span class="badge badge-success pull-right">{{count(\App\Work::where('status','0')->get())}}</span></a> </li>
                              </ul>
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
                              <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                <h4 class="card-title">Active Course</h4>
                          <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                           <div class="pull-right">
                  <button data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-primary btn-bg">Add Course</button>
                             </div>
                                <div class="table-responsive m-t-40">
       <table id="example23" class="display nowrap table table-hover table-striped table-bordered " cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Instructor</th>
                                                <th>Number<br>of<br>Section</th>
                                                <th>Number<br>of<br>Lesson</th>
                                                <th>Number<br>of<br>Enrolled<br>Student</th>
                                                <th>Option</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>ID</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Instructor</th>
                                                <th>Number<br>of<br>Section</th>
                                                <th>Number<br>of<br>Lesson</th>
                                                <th>Number<br>of<br>Enrolled<br>Student</th>
                                                <th>Option</th>
                                            </tr>
                                        </tfoot>
                      <tbody>
                @foreach(\App\Work::where('status','1')->latest()->get() as $course)
                        <tr>
<td>{{$loop->iteration}}</td>
                      <td>{{$course->title}}</td>
                      <td>{{$course->category}}</td>
                      <td>{{$course->instructor}}</td>
                      <td>{{count(\App\Section::where('course_id',$course->id)->get())}}</td>
                       <td>{{count(\App\Lesson::where('course_id',$course->id)->get())}}</td>
                      <td></td>
<td>
 <div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-settings"></i></button>
     <div class="dropdown-menu animated flipInX">
                <a class="dropdown-item" href="javascript:void(0)"> View Course On Frontend</a>
                <a class="dropdown-item" onclick="showAjaxModal('{{url('')}}/manage/section/course/{{$course->id}}')" href="javascript:void(0)">Manage Section</a>
                 <a class="dropdown-item" href="{{url('')}}/manage/lesson/course?course={{$course->id}}"> Manage Lesson</a>
                 <a onclick="showAjaxModal('{{url('')}}/mark/course/pending/{{$course->id}}')" class="dropdown-item" href="javascript:void(0)">Mark As Pending</a>
                <a onclick="showAjaxModal('{{url('')}}/edit/real/course/{{$course->id}}')" class="dropdown-item" href="javascript:void(0)">Edit</a>
                <a class="dropdown-item" onclick="deletecourse('{{$course->id}}')" href="javascript:void(0)">Delete</a>
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
                                <h4 class="card-title">Course Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
      <table id="example24" class="display nowrap table table-hover table-striped table-bordered " cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Instructor</th>
                                                <th>Number<br>of<br>Section</th>
                                                <th>Number<br>of<br>Lesson</th>
                                                <th>Number<br>of<br>Enrolled<br>Student</th>
                                                <th>Option</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>ID</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Instructor</th>
                                                <th>Number<br>of<br>Section</th>
                                                <th>Number<br>of<br>Lesson</th>
                                                <th>Number<br>of<br>Enrolled<br>Student</th>
                                                <th>Option</th>
                                            </tr>
                                        </tfoot>
                      <tbody>
                @foreach(\App\Work::where('status','0')->latest()->get() as $course)
                        <tr>
<td>{{$loop->iteration}}</td>
                      <td>{{$course->title}}</td>
                      <td>{{$course->category}}</td>
                      <td>{{$course->instructor}}</td>
                      <td>{{count(\App\Section::where('course_id',$course->id)->get())}}</td>
                       <td>{{count(\App\Lesson::where('course_id',$course->id)->get())}}</td>
                      <td></td>
<td>
 <div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-settings"></i></button>
     <div class="dropdown-menu animated flipInX">
                 <a onclick="showAjaxModal('{{url('')}}/mark/course/active/{{$course->id}}')" class="dropdown-item" href="javascript:void(0)">Mark As Active</a>
                 <a onclick="showAjaxModal('{{url('')}}/edit/real/course/{{$course->id}}')" class="dropdown-item" href="javascript:void(0)">Edit</a>
                <a class="dropdown-item" onclick="deletecourse('{{$course->id}}')" href="javascript:void(0)">Delete</a>
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
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">{{\App\Provider::first()->name}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                      <div class="modal-body">
  <p>
     <ul class="nav nav-tabs customtab2" role="tablist">
<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#basic" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Basic Info</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#outcome" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Results</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#category" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Category & Sub Category</span></a> </li>
                                     <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#require" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Requirement</span></a> </li>
                                      <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#price" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Price</span></a> </li>
                                      <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#thumb" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Thumbnail</span></a> </li>
                                </ul>
                                        </p>
<form action="{{url('')}}/add/new/course" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
  <div class="tab-content">
                  <div class="tab-pane active" id="basic" role="tabpanel">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">Add Course Form</h4>
                <h6 class="card-subtitle"></h6>
         <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Title</label>
                           <input type="text" class="form-control" name="title">
                            </div>
                             <div class="form-group">
                              <label>Description</label>
                         <textarea class="form-control" name="description"></textarea>
                            </div> 
                            </div> 
                            <div class="col-md-6"> 
                            <div class="form-group">
                              <label>Level</label>
                      <select class="form-control" name="level">
                       <option>Beginner</option>
                        <option>Intermediate</option>
                         <option>Advanced</option> 
                      </select>
                            </div>
                            <div class="form-group">
                              <label>Course Language</label>
                      <select style="width: 100%;" class="form-control select2" name="lang">
                @foreach(\App\Language::all() as $lang)
                       <option value="{{$lang->id}}">{{$lang->name}}</option>
                @endforeach
                      </select>
                            </div>
                          </div>
                           <div class="col-md-12"> 
                            <div class="form-group">
                              <label>Detail</label>
                         <textarea class="form-control mymce"></textarea>
                            </div>
                            <textarea id="showtext" style="display: none;" class="form-control" name="detail"></textarea>

                            </div>
                                   
                              </div>
                                    
                        </div>
                    </div>
                </div>
            </div>
                          </div>
                        <div class="tab-pane" id="outcome" role="tabpanel">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">Add Course Expected Results </h4>
                <h6 class="card-subtitle"></h6>
         <div class="row">
                        <div class="col-md-12">
                   <span id="medicine">
                            <div class="form-group">
                               <div class="input-group">
                           <input type="text" class="form-control" placeholder="Add Course Expected Result" name="result[]">
                            <span class="input-group-btn">
              <button onclick="add_medicine()"  type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                              </span>
                          </div>
                            </div>
                    </span>
                     <span id="medicine_input">
                <div class="form-group">
                               <div class="input-group">
                           <input type="text" class="form-control" placeholder="Add Course Expected Result" name="result[]">
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElement(this)"  type="button" class="btn btn-primary"><i class="fa fa-trash"></i></button>
                              </span>
                            </div>  
                      </div>     
                     </span>
                            </div>
                                   
                              </div>
                                    
                        </div>
                    </div>
                </div>
            </div>
                          </div>
                          <div class="tab-pane" id="category" role="tabpanel">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">Add Course Expected Results </h4>
                <h6 class="card-subtitle"></h6>
         <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                             <label>Choose Category</label>
        <select style="width: 100%;" class="form-control select2" name="category">
    @foreach(\App\Category::all() as $cat)
          <option>{{$cat->title}}</option>
    @endforeach
        </select>
                            </div>
                <div class="form-group">
  <label>Choose Sub Category</label>
    <select style="width: 100%;" class="form-control select2" name="subcategory">
    @foreach(\App\Subcategory::all() as $sub)
          <option>{{$sub->title}}</option>
    @endforeach
        </select>
                            </div>  
                      </div>     
                            </div>
                                   
                              </div>
                                    
                        </div>
                    </div>
            </div>
                          </div>
              <div class="tab-pane" id="require" role="tabpanel">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">Add Requirements </h4>
                <h6 class="card-subtitle"></h6>
         <div class="row">
                        <div class="col-md-12">
                   <span id="medicinen">
                            <div class="form-group">
                               <div class="input-group">
                           <input type="text" class="form-control" placeholder="Add Course Requirement" name="require[]">
                            <span class="input-group-btn">
              <button onclick="add_medicinen()"  type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                              </span>
                          </div>
                            </div>
                    </span>
                     <span id="medicine_inputn">
                <div class="form-group">
                               <div class="input-group">
                           <input type="text" class="form-control" placeholder="Add Course Requirement" name="require[]">
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElementn(this)"  type="button" class="btn btn-primary"><i class="fa fa-trash"></i></button>
                              </span>
                            </div>  
                      </div>     
                     </span>
                            </div>
                                   
                              </div>
                                    
                        </div>
                    </div>
                </div>
            </div>
                          </div>
                             <div class="tab-pane" id="price" role="tabpanel">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">Add Requirements </h4>
                <h6 class="card-subtitle"></h6>
         <div class="row">
          <div class="col-md-3"></div>
                        <div class="col-md-6">
                    <div class="form-group">
                      <label>Course Price {{\App\Currency::find(\App\Setting::first()->currency)->symbol}}</label>
                      <input type="number" class="form-control" name="price">
                    </div>
                     <div class="form-group">
                      <label>Expected Days to Finish Course</label>
                      <input type="number" class="form-control" name="days">
                    </div>
                    <div class="form-group">
                      <label>Renewal Price {{\App\Currency::find(\App\Setting::first()->currency)->symbol}}</label>
                      <input type="number" class="form-control" name="rprice">
                    </div>
                        </div>
                         <div class="col-md-3"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                           <div class="tab-pane" id="thumb" role="tabpanel">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Add Course Thumbnail </h4>
                <h6 class="card-subtitle"></h6>
         <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                          <label for="input-file-now">Add Course Thumbnail</label>
                                <input type="file" id="input-file-now" name="file" class="dropify" />
                              </div>
                            </div>
                          </div>
                        </div>
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
                </div>
                        </div>
                          
                           </form>
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
              function deletecourse(id)
              {
                if(confirm('Press Ok to confirm delete!!!')){ 
                $.get('{{url('')}}/delete/course/'+id,function(data)
                {
                if(data==0){
                  swal('Course has been deleted Successfully', "clicked the button to continue!", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=29');
                }
            else{
                     swal("Error in Course, It can not be deleted!", "clicked the button to continue!", "error");
                    }    
                });
            }
              }
      $(function () {
    setInterval(function(){
 document.getElementById('showtext').value =$(".mymce").val();
   }, 1000);
});
          </script>
   <script type="text/javascript">
    var medicine_count      = 1;
    var total_amount        = 0;
    var deleted_medicines   = [];
    // CREATING BLANK medicine INPUT
    var blank_medicine = '';
    $(document).ready(function () {
      $('#medicine_input').hide();
        blank_medicine = $('#medicine_input').html();
    });
    function add_medicine()
    {
        medicine_count++;
        $("#medicine").append(blank_medicine);

        $('#medicine_id').attr('id', 'medicine_id_' + medicine_count);
        $('#medicine_delete').attr('id', 'medicine_delete_' + medicine_count);
        $('#medicine_delete_' + medicine_count).attr('onclick', 'deletemedicineParentElement(this, ' + medicine_count + ')');
    }

    // REMOVING medicine INPUT
    function deletemedicineParentElement(n, medicine_count) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
        deleted_medicines.push(medicine_count);
    }
</script>
 <script type="text/javascript">
    var medicine_countn      = 1;
    var total_amountn        = 0;
    var deleted_medicinesn   = [];
    // CREATING BLANK medicine INPUT
    var blank_medicinen = '';
    $(document).ready(function () {
      $('#medicine_inputn').hide();
        blank_medicinen = $('#medicine_inputn').html();
    });
    function add_medicinen()
    {
        medicine_countn++;
        $("#medicinen").append(blank_medicinen);

        $('#medicine_id').attr('id', 'medicine_id_' + medicine_countn);
        $('#medicine_delete').attr('id', 'medicine_delete_' + medicine_countn);
        $('#medicine_delete_' + medicine_countn).attr('onclick', 'deletemedicineParentElementn(this, ' + medicine_countn + ')');
    }
    // REMOVING medicine INPUT
    function deletemedicineParentElementn(n, medicine_countn) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
        deleted_medicinesn.push(medicine_countn);
    }
</script>
@endsection
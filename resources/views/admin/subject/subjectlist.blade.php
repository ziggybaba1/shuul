 @extends('layouts.admin')
@section('content')

              <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Subject List</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">Home</a></li>
                            <li class="breadcrumb-item active">subject-list</li>
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
                                <h4 class="card-title">Subject Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="pull-right">
                                 <button onclick="showAjaxModal('{{url('')}}/add/subject')" class="btn btn-primary btn-bg">Add New Subject</button>
                             </div>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Subject Type</th>
                                                <th>Subject Name</th>
                                                <th>Subject Code</th>
                                                <th>Optional</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>Subject Type</th>
                                                <th>Subject Name</th>
                                                <th>Subject Code</th>
                                                <th>Optional</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Subject::all() as $class)
                                            <tr>
                                <td>{{\App\Subjecttype::find($class->type)->title}}</td>
                                    <td>{{$class->title}}</td>
                                 <td>{{$class->code}}</td> 
                                           @if($class->code==0)
                                    <td>Compulsory</td>
                                @else
                                 <td>Optional</td>
                                @endif     
                    <td><button onclick="showAjaxModal('{{url('')}}/admin/edit_Subject/{{$class->id}}')" class="btn btn-primary btn-sm btn-block"><i class="fa fa-book"></i></button></td>
                    <td><button onclick="deletesubject('{{$class->id}}')" class="btn btn-danger btn-sm btn-block"><i class="fa fa-trash"></i></button></td>
                                            </tr>
                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          <script type="text/javascript">
              function deletesubject(id)
              {
                 if(confirm('Press Ok to confirm delete!!!')){ 
                $.get('{{url('')}}/delete/subject/'+id,function(data)
                {
                if(data==0){
                    window.location.assign('{{url('')}}/admin/page.fmp?page=6');
                }
            else{
                     swal("Subject has been assigned, It can not be deleted!", "clicked the button to continue!", "error");
                    }    
                });
            }
              }
          </script>
                @endsection
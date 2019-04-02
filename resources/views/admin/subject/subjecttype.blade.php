 @extends('layouts.admin')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
              <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Subject Type</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">Home</a></li>
                            <li class="breadcrumb-item active">subject-type</li>
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
                @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                            <div class="card-body">
                                <h4 class="card-title">Subject type Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="pull-right">
                                    <button href="" alt="default" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-primary btn-bg"><i class="fa fa-plus"></i>
                Add Type</button>
                                </div>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Type Name</th>
                                                <th>Type Code</th>
                                                <th>Optional</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>ID</th>
                                                <th>Type Name</th>
                                                <th>Type Code</th>
                                                <th>Optional</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Subjecttype::all() as $class)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$class->title}}</td>
                                                <td>{{$class->code}}</td>
                                        @if($class->option==0)
                                            <td>Compulsory</td>
                                        @else
                                         <td>Optional</td>
                                         @endif
<td><button onclick="showAjaxModal('{{url('')}}/edit/subject/type/{{$class->id}}')" class="btn btn-primary btn-sm btn-block"><i class="fa fa-book"></i></a></td>
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
           <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Add Subject Type</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
            <form action="{{url('')}}/create/subject-type" method="post" class="form-horizontal m-t-40">
                                 {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="example-email">Type Name<span class="help"></span></label>
                                    <input name="title" type="text" id="example-email"  class="form-control" placeholder="e.g Mathematics">
                                </div>
                                 <div class="form-group">
                                    <label for="example-email">Type Code<span class="help"></span></label>
                                    <input name="code" type="text" id="example-email"  class="form-control" placeholder="e.g MTH">
                                </div>
                                <div class="form-group">
                                    <label>Description<span class="help"></span></label>
                                    <textarea name="description" class="form-control"></textarea>
                                </div>
                                 <div class="form-group">
                                <h4 class="card-title">Optional Type</h4>
                                <div class="demo-radio-button">
                        <input name="option" value="1" type="radio" id="radio_1" checked />
                                    <label for="radio_1">Yes</label>
                            <input name="option" value="0" type="radio" id="radio_2" />
                                    <label for="radio_2">No</label>
                                </div>
                            </div>
                               <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary" value="Submit">
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
                                <script type="text/javascript">
              function deletesubject(id)
              {
                 if(confirm('Press Ok to confirm delete!!!')){ 
                $.get('{{url('')}}/delete/subject-type/'+id,function(data)
                {
                if(data==0){
                    window.location.assign('{{url('')}}/add/batch_questions?quiz=4');
                }
            else{
                     swal("Type has been assigned to Subject, It can not be deleted!", "clicked the button to continue!", "error");
                    }    
                });
            }
              }
          </script>
                @endsection
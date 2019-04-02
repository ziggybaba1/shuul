 @extends('layouts.admin')
@section('content')
 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Teachers Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Photo</th>
                                                <th>Teacher Name</th>
                                                <th>Class Assign</th>
                                                <th>Edit</th>
                                                <th>View</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Photo</th>
                                                <th>Teacher Name</th>
                                                <th>Class Assign</th>
                                                <th>Edit</th>
                                                <th>View</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Teacher::all() as $class)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
            <td><img src="{{url('')}}/uploads/avatars/{{$class->image}}" width="70px" height="70px"></td>
                <td>{{$class->gname}} {{$class->fname}}</td>
            <td>{{\App\Course::find($class->assign)->title}}</td>
                    <td><a onclick="showAjaxModal('{{url('')}}/edit/teacher/info/{{$class->id}}')" class="btn btn-primary btn-sm btn-block"><i class="fa fa-book"></i></a></td>
                     <td><a href="" class="btn btn-secondary btn-sm btn-block"><i class="fa fa-eye"></i></a></td>
                    <td><a href="" class="btn btn-danger btn-sm btn-block"><i class="fa fa-trash"></i></a></td>
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
            $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
        </script>
        @endsection
              
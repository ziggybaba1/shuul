<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Result Behavioural/Personality Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Class</th>
                                                <th>Behavioural/Personality</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>#</th>
                                                <th>Class</th>
                                                <th>Behavioural/Personality</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Course::all() as $class)
                                            <tr>
                                <td>{{$loop->iteration}}</td>
                                    <td>{{$class->title}}</td>
                <td>
            @foreach(\App\Behavioural::where('class_id',$class->id)->get() as $behave)
                    {{$behave->name}},
            @endforeach
                </td> 
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
<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Test nnHead Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Subject</th>
                                                <th>Duration</th>
                                                <th>Batch</th>
                                                <th>Total Question</th>
                                                <th>Start Date</th>
                                                <th>Instruction</th>
                                                <th>Add Questions</th>
                                                <th>Option</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>Subject</th>
                                                <th>Duration</th>
                                                <th>Batch</th>
                                                <th>Total Question</th>
                                                <th>Start Date</th>
                                                <th>Instruction</th>
                                                <th>Add Questions</th>
                                                <th>Option</th>
                                              
                                           
                                            </tr>
                                        </tfoot>
                      <tbody>
                @foreach(\App\Batch::all() as $batch)
                        <tr>
                        <td>{{\App\Subject::find($batch->subject)->title}}</td>
                        <td>{{$batch->duration}}</td>
                        <td>{{$batch->batch}}</td>
                    <td>{{count(\App\Question::where('batch_id',$batch->id)->get())}}</td>
                        <td>{{$batch->date}}</td>
                        <td>{{$batch->instruction}}</td>
    <td><a href="{{url('')}}/add/batch_questions?quiz={{$batch->id}}" class="btn btn-sm btn-block btn-primary"><i class="fa fa-plus"></i></a></td>

    <td><div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-settings"></i>
                                    </button>
                                    <div class="dropdown-menu animated flipInX">
                                        <a onclick="showAjaxModal('{{url('')}}/manage/lesson/course/{{$class->id}}')" class="dropdown-item" href="javascript:void(0)">Edit</a>
                                        <a class="dropdown-item" onclick="deletelesson('{{$class->id}}')" href="javascript:void(0)">Delete</a>
                                    </div>
                                </div></td>
   
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
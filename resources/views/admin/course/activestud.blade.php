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
     <table id="example25" class="display nowrap table table-hover table-striped table-bordered " cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Student Name</th>
                                                <th>Progress Status</th>
                                                <th>Projects</th>
                                                <th>Status</th>
                                                <th>Option</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>ID</th>
                                                <th>Student Name</th>
                                                <th>Progress Status</th>
                                                <th>Projects</th>
                                                <th>Status</th>
                                                <th>Option</th>   
                                            </tr>
                                        </tfoot>
                      <tbody>
                @foreach(\App\Subscription::where('course_id',$id)->latest()->get() as $batch)
            @if(count(\App\Enroll::where('id',$batch->enroll_id)->get())>0)
                        <tr>
                        <td>{{$loop->iteration}}</td>
                       <td>{{\App\Enroll::find($batch->enroll_id)->name}}</td>
                      <td>
                    <h5 class="m-t-30">Completion Stat<span class="pull-right">85%</span></h5>
                         <div class="progress ">
                <div class="progress-bar bg-danger wow animated progress-animated" style="width: 85%; height:6px;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                                        </div>
                      </td>
        <td></td>
        <td></td>
<td>
  <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-settings"></i>
                                    </button>
                                    <div class="dropdown-menu animated flipInX">
                                       <a  class="dropdown-item" href="javascript:void(0)">Certificate Recommendation</a>
                                        <a class="dropdown-item" href="javascript:void(0)">Send Complete Message</a>
                                    </div>
                                </div>
</td>
                        </tr>
                @endif
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
<script type="text/javascript">
   $('#example25').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>
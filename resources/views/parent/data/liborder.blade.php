<div class="row">
                    <div class="col-12">
                          @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{\App\User::findOrFail(\App\Student::findOrFail($id)->data_id)->name}} Order List</h4>
                                <h6 class="card-subtitle"></h6>
                                 <div class="pull-left">
                               
                             </div>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                  <th>#</th>
                                                <th>@lang('parent.collector')</th>
                                                <th>@lang('parent.book-issued')</th>
                                                <th>@lang('parent.issued-date')</th>
                                                <th>@lang('parent.return-date')</th>
                                                <th>@lang('parent.status')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>#</th>
                                              <th>@lang('parent.collector')</th>
                                                <th>@lang('parent.book-issued')</th>
                                                <th>@lang('parent.issued-date')</th>
                                                <th>@lang('parent.return-date')</th>
                                                <th>@lang('parent.status')</th>
                                            </tr>
                                        </tfoot>
                                        </tfoot>
                                        <tbody>
         @foreach(\App\Borrow::where('collector',$id)->latest()->get() as $batch)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{\Auth::user()->name}}</td>
                                                <td>
                {{\App\Inventory::find($batch->book)->title}}
                                                </td>
                                               <td>{{\Carbon\Carbon::parse($batch->idate)->toFormattedDateString()}}</td>
                      <td>{{\Carbon\Carbon::parse($batch->rdate)->toFormattedDateString()}}</td>
            @if($batch->status=='Pending Return'||$batch->status=='Damaged')
                      <td><span class="btn btn-warning">{{$batch->status}}</span></td>
            @elseif($batch->status=='Returned')
             <td><span class="btn btn-success">{{$batch->status}}</span></td>
            @endif
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
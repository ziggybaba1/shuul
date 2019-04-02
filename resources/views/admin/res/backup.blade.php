<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="pull-right">
                                     <a id="create-new-backup-button" href="{{ url('backup/create') }}" class="btn btn-primary pull-right text-white"
               style="margin-bottom:2em;"><i
                    class="fa fa-plus"></i> @lang('admin.create_back')
            </a>
                                </div>
                                <h4 class="card-title">@lang('admin.admin_back')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="table-responsive m-t-40">
        <table id="example22" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                               <th>@lang('admin.fil_nam')</th>
                        <th>@lang('admin.siz')</th>
                        <th>@lang('admin.date')</th>
                       
                        <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>#</th>
                                              <th>@lang('admin.fil_nam')</th>
                        <th>@lang('admin.siz')</th>
                        <th>@lang('admin.date')</th>
                       
                        <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
 @forelse($backups as $backup)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $backup['file_name'] }}</td>
                            <td>{{ humanFilesize($backup['file_size']) }}</td>
                            <td>
                                 @php
                                $data=[];
                                $data=explode("-",$backup['file_name']);
                                @endphp
                                {{\Carbon\Carbon::parse($data[0].'-'.$data[1].'-'.$data[2].' '.str_replace('.zip','',$data[3]))->toDayDateTimeString()}}
                            </td>
                          
                            <td class="text-right">
                                <a class="btn btn-default"
                                   href="{{ url('backup/download/'.$backup['file_name']) }}"><i
                                        class="fa fa-cloud-download"></i> @lang('admin.download')</a>
                                <a class="btn btn-danger" data-button-type="delete"
                                   href="{{ url('backup/delete/'.$backup['file_name']) }}"><i class="fa fa-trash-o"></i>
                                    @lang('admin.delete')</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6"></td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                  
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
     $('#example22').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>
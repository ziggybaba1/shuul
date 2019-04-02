@extends('layouts.student')
@section('content')
<div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor">{{\Auth::user()->name}} @lang('admin.library') @lang('admin.order')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.list')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.library') @lang('admin.order')</li>
                        </ol>
                    </div>
                     <div class="col-md-6 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                              <h5 class="text-themecolor">@lang('admin.current-sess'): {{\App\Session::latest()->first()->session}} </h5><br>
                            <h5 class="text-themecolor"> (
                                @if(\App\Session::latest()->first()->terms==='First')
                                @lang('admin.first_term')
                                @elseif(\App\Session::latest()->first()->terms==='Second')
                                @lang('admin.second_term')
                                 @elseif(\App\Session::latest()->first()->terms==='Third')
                                @lang('admin.third_term')
                                 @elseif(\App\Session::latest()->first()->terms==='Fourth')
                                @lang('admin.fourth_term')
                             @endif
                             )
                         </h5>
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
                                <h4 class="card-title">{{\Auth::user()->name}} @lang('admin.library') @lang('admin.order')</h4>
                                <h6 class="card-subtitle"></h6>
                                 <div class="pull-left">
                               
                             </div>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                  <th>#</th>
                                                <th>@lang('admin.collector')</th>
                                                <th>@lang('admin.book-issued')</th>
                                                <th>@lang('admin.issued-date')</th>
                                                <th>@lang('admin.return-date')</th>
                                                <th>@lang('admin.status')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>#</th>
                                              <th>@lang('admin.collector')</th>
                                                <th>@lang('admin.book-issued')</th>
                                                <th>@lang('admin.issued-date')</th>
                                                <th>@lang('admin.return-date')</th>
                                                <th>@lang('admin.status')</th>
                                            </tr>
                                        </tfoot>
                                        </tfoot>
                                        <tbody>
         @foreach(\App\Borrow::where('collector',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->latest()->get() as $batch)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{\Auth::user()->name}}</td>
                                                <td>
                {{\App\Inventory::find($batch->book)->title}}
                                                </td>
                                               <td>{{\Carbon\Carbon::parse($batch->idate)->toFormattedDateString()}}</td>
                      <td>{{\Carbon\Carbon::parse($batch->rdate)->toFormattedDateString()}}</td>
            @if($batch->status=='Pending Return'||$batch->status=='Damaged')
                      <td><span class="btn btn-warning">@lang('admin.pending_return')</span></td>
            @elseif($batch->status=='Returned')
             <td><span class="btn btn-success">@lang('admin.returned')</span></td>
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

@endsection
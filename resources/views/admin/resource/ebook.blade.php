@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.book') @lang('admin.inventory')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.book') @lang('admin.inventory')</li>
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
<div id="showresultshere">
 <div class="row">
                    <div class="col-12">
                         @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.book') @lang('admin.inventory')  @lang('admin.export')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                 <div class="pull-right">
                                 <button data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-primary btn-bg">@lang('admin.add') @lang('admin.book')  @lang('admin.collection')</button>
                             </div>
                                <div class="table-responsive m-t-40">
       <table id="example24" class="display nowrap table table-hover table-striped table-bordered " cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.title')</th>
                                                <th>@lang('admin.author')</th>
                                                 <th>@lang('admin.category')</th>
                                                <th>@lang('admin.date') @lang('admin.stock')</th>
                                                <th>@lang('admin.availability')</th>
                                                <th>@lang('admin.edit')</th>
                                                <th>@lang('admin.delete')</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>#</th>
                                                <th>@lang('admin.title')</th>
                                                <th>@lang('admin.author')</th>
                                                 <th>@lang('admin.category')</th>
                                                <th>@lang('admin.date') @lang('admin.stock')</th>
                                                <th>@lang('admin.availability')</th>
                                                <th>@lang('admin.edit')</th>
                                                <th>@lang('admin.delete')</th>   
                                            </tr>
                                        </tfoot>
                      <tbody>
                @foreach(\App\Inventory::all() as $batch)
                        <tr>
                            <td>{{$loop->iteration}}</td>
        <td>{{$batch->title}}</td>
        <td>{{$batch->author}}</td>
                        <td>{{$batch->category}}</td>
<td>{{\Carbon\Carbon::parse($batch->created_at)->toFormattedDateString()}}</td>
                      <td></td>
<td><button onclick="showAjaxModal('{{url('')}}/edit/inventory/file/{{$batch->id}}')" class="btn btn-sm btn-info btn-block"><i class="fa fa-book"></i> @lang('admin.edit')</button></td>
<td><button onclick="deleteinvent('{{$batch->id}}')" class="btn btn-sm btn-danger btn-block"><i class="fa fa-trash"></i>@lang('admin.delete')</button></td>
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
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">{{\App\Provider::first()->name}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                              <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">@lang('admin.add') @lang('admin.book') @lang('admin.inventory')</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/add/new/book" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                                      <div class="form-group">
                                         <label>@lang('admin.book') @lang('admin.title')</label>
                                        <input type="text" class="form-control" name="title">
                                      </div>   
                            </div>
                                    <div class="col-md-6">
                                <div class="form-group">
                                  <label>@lang('admin.book') @lang('admin.author')</label>
                                <input type="text" class="form-control" name="author">
                                  </div>   
                                </div>
                              </div>
                       <div class="row">
                                        <div class="col-md-6">
                                           <div class="form-group">
                                         <label>@lang('admin.book') @lang('admin.edition')</label>
                             <input type="text" class="form-control" name="edition">
                                      </div>   
                                        </div>
                        <div class="col-md-6">
                                      <div class="form-group">
                          <label>@lang('admin.book') @lang('admin.category')</label>
                  <select style="width: 100%;" required="" class="form-control select2" name="category">
                              <option>@lang('admin.select') @lang('admin.category')</option>
                  @foreach(\App\Category::latest()->get() as $subject)
                              <option value="{{$subject->title}}">{{$subject->title}}</option>
                              @endforeach
                            </select>
                                      </div>   
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                           <div class="form-group">
                                         <label>@lang('admin.book') @lang('admin.total')</label>
                             <input type="number" class="form-control" name="total">
                                      </div>   
                                        </div>
                                        <div class="col-md-6">
                                           <div class="form-group">
                                         <label>@lang('admin.class')</label>
                               <select style="width: 100%;" class="form-control select2">
                              <option>@lang('admin.select') @lang('admin.class')</option>
                  @foreach(\App\Course::all() as $class)
                              <option value="{{$class->title}}">{{$class->title}}</option>
                              @endforeach
                            </select>
                                      </div>   
                                        </div>
                                      </div>
                            
                                     <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block" value="@lang('admin.submit')">
                                     </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                  </form>
                        </div>
                    </div>
                </div>
            </div>
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
             function deleteinvent(id)
              {
                if(confirm("@lang('admin.confirm_delete')")){ 
                $.get('{{url('')}}/delete/inventory/'+id,function(data)
                {
                if(data==0){
                  swal("@lang('admin.account_delete')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=26');
                }
            else{
                     swal("@lang('admin.error_delete')", "@lang('admin.continue-button')", "error");
                    }      
                });
            }
              }
          </script>
@endsection
@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Course Category</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">Home</a></li>
                            <li class="breadcrumb-item active">course-category</li>
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
                         @if (session('message'))
                  <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card">
                            <div class="card-body">
                              <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                <h4 class="card-title">Course Category Export</h4>
                          <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                           <div class="pull-right">
                  <button data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-primary btn-bg">Add Category</button>
                             </div>
                                <div class="table-responsive m-t-40">
                                    <div id="showresultshere">
     <table id="example23" class="display nowrap table table-hover table-striped table-bordered " cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Category Title</th>
                                                <th>Sub Categories</th>
                                                <th>Manage Sub Category</th>
                                                <th>Edit Category</th>
                                                <th>Delete</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Category Title</th>
                                                <th>Sub Categories</th>
                                                <th>Manage Sub Category</th>
                                                <th>Edit Category</th>
                                                <th>Delete</th> 
                                            </tr>
                                        </tfoot>
                      <tbody>
                @foreach(\App\Category::latest()->get() as $batch)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                       <td>{{$batch->title}}</td>
                      <td>
                    <ul>
    @foreach(\App\Subcategory::where('cat_id',$batch->id)->get() as $cat)
                <li>{{$cat->title}}</li>
    @endforeach
                    </ul>
                      </td>
<td><button onclick="showAjaxModal('{{url('')}}/manage/course/category/{{$batch->id}}')" class="btn btn-sm btn-default btn-block">Manage Sub Category</button></td>
<td><button onclick="showAjaxModal('{{url('')}}/edit/course/category/{{$batch->id}}')" class="btn btn-sm btn-default btn-block">Manage Category</button></td>
<td><button onclick="deletecategory('{{$batch->id}}')" class="btn btn-sm btn-danger btn-block"><i class="fa fa-trash"></i>Delete</button></td>
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
</div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
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
<h4 class="card-title">Add New Course Category</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/add/course/category" method="post" enctype="multipart/form-data" class="formsubmit">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label>Title</label>
                             <input type="text" class="form-control" name="title">
                            </div>   
                            </div>
        </div>
                                     <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block" value="Submit">
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
              function deletecategory(id)
              {
                if(confirm('Press Ok to confirm delete!!!')){ 
                $.get('{{url('')}}/delete/category/'+id,function(data)
                {
                if(data==0){
                  swal('Category has been deleted Successfully', "clicked the button to continue!", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=28');
                }
            else{
                     swal("Error in deleting Category, It can not be deleted!", "clicked the button to continue!", "error");
                    }    
                });
            }
              }
          </script>
@endsection
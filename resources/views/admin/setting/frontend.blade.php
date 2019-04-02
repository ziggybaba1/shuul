 @extends('layouts.admin')
@section('content')
<style type=text/css>
      .CodeMirror {
        float: left;
        width: 100%;
        height: 500px;
        border: 1px solid black;
      }
      iframe {
        width: 100%;
        float: left;
        height: 500px;
        border: 1px solid black;
        border-left: 0px;
      }
    </style>
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.frontend') @lang('admin.configuration')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.frontend') @lang('admin.configuration')</li>
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
                    <div class="col-md-12">
                          @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.frontend') @lang('admin.configuration')</h4>
                                <h6 class="card-subtitle"></h6>
                                 <div class="pull-left">
                               
                             </div>
                               <div class="vtabs ">
                                    <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" id="" data-toggle="tab" href="#notice" role="tab"><span></span>{{\App\Frontheader::first()->home}}</a> </li>
                                         <li class="nav-item"> <a class="nav-link" onclick="geturl('16','counter')" data-toggle="tab" href="#counter" role="tab"><span></span>@lang('admin.counter')</a> </li>
                                           <li class="nav-item"> <a class="nav-link" onclick="geturl('1','homepage')" data-toggle="tab" href="#homepage" role="tab"><span></span>{{\App\Frontheader::first()->notice}}</a> </li>
                                             <li class="nav-item"> <a class="nav-link" onclick="geturl('3','gallery')" data-toggle="tab" href="#gallery" role="tab"><span></span>{{\App\Frontheader::first()->gallery}}</a> </li>
                                           <li class="nav-item"> <a class="nav-link" onclick="geturl('4','teacher')" data-toggle="tab" href="#teacher" role="tab"><span></span>{{\App\Frontheader::first()->teacher}}</a> </li>
                                            <li class="nav-item"> <a class="nav-link" onclick="geturl('2','gallery')" data-toggle="tab" href="#gallery" role="tab"><span></span>{{\App\Frontheader::first()->course}}</a> </li>
                                            <li class="nav-item"> <a class="nav-link" onclick="geturl('5','about')" data-toggle="tab" href="#about" role="tab"><span></span>{{\App\Frontheader::first()->about}}</a> </li>
                                             <li class="nav-item"> <a class="nav-link" onclick="geturl('6','future')" data-toggle="tab" href="#future" role="tab"><span></span>{{\App\Frontheader::first()->future}}</a> </li>
                                              <li class="nav-item"> <a class="nav-link" onclick="geturl('7','testimonial')" data-toggle="tab" href="#testimonial" role="tab"><span></span>@lang('admin.testimony')</a> </li>
                                           <li class="nav-item"> <a class="nav-link" onclick="geturl('8','header')" data-toggle="tab" href="#header" role="tab"><span></span>@lang('admin.header')</a> </li>
                                            <li class="nav-item"> <a class="nav-link" onclick="geturl('10','footer')" data-toggle="tab" href="#footer" role="tab"><span></span>@lang('admin.footer')</a> </li>
                                             <li class="nav-item"> <a class="nav-link" onclick="geturl('11','setting')" data-toggle="tab" href="#setting" role="tab"><span></span>@lang('admin.general') @lang('admin.setting')</a> </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="notice" role="tabpanel">
                                            <div class="p-20">
                                              <div class="row">
                                              
                                                <div class="col-md-6">
                                <button data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-primary btn-sm">@lang('admin.add') @lang('admin.image')</button>
                                                  <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>@lang('admin.slide') @lang('admin.image')</th>
                                                <th>@lang('admin.slide') @lang('admin.title')</th>
                                                <th>@lang('admin.slide') @lang('admin.status')</th>
                                                <th>@lang('admin.option')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    @foreach(\App\Frontgallery::all() as $gallery)
                                            <tr>
        <td><img width="70px" src="{{url('')}}/uploads/frontend/{{$gallery->image}}"></td> 
                                              <td>{{$gallery->title}}</td> 
                                               @if($gallery->status=='1')
                                               <td>@lang('admin.published')</td>
                                               @elseif($gallery->status=='0')
                                               <td>@lang('admin.pending')</td>
                                               @endif 
                                               <td>
                                                 <div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-settings"></i></button>
     <div class="dropdown-menu ">
                <a onclick="showAjaxModal('{{url('')}}/edit/front/gallery/{{$gallery->id}}')" class="dropdown-item" href="javascript:void(0)">@lang('admin.edit')</a>
                <a class="dropdown-item" onclick="deletegallery('{{$gallery->id}}')" href="javascript:void(0)">@lang('admin.delete')</a>
      </div>
          </div>
                                               </td>
                                            </tr>
                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                  <button data-toggle="modal" data-target=".bs-example-modal-ft" class="btn btn-info btn-sm">@lang('admin.add') @lang('admin.feature')</button>
                                                  <div class="table-responsive m-t-40">
                                    <table id="example24" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                               <th>@lang('admin.feature') @lang('admin.image')</th>
                                                <th>@lang('admin.feature') @lang('admin.title')</th>
                                                <th>@lang('admin.feature') @lang('admin.status')</th>
                                                <th>@lang('admin.option')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                     @foreach(\App\Frontpage::all() as $feat)
                                            <tr>
                                             <td><img width="50px" src="{{url('')}}/uploads/frontend/{{$feat->image}}"></td> 
                                              <td>{{$feat->title}}</td> 
                                              @if($feat->status=='1')
                                               <td>@lang('admin.published')</td>
                                               @elseif($feat->status=='0')
                                               <td>@lang('admin.pending')</td>
                                               @endif 
                                               <td>
                                                 <div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-settings"></i></button>
     <div class="dropdown-menu ">
                <a onclick="showAjaxModal('{{url('')}}/edit/feature/home/{{$feat->id}}')" class="dropdown-item" href="javascript:void(0)">@lang('admin.edit')</a>
                <a class="dropdown-item" onclick="deletefeature('{{$feat->id}}')" href="javascript:void(0)">@lang('admin.delete')</a>
      </div>
          </div>
                                               </td>
                                            </tr>
                        @endforeach
                                        </tbody>
                                    </table>
                                </div>  
                                                </div>
                                               
                                              </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane  p-20" id="homepage" role="tabpanel">
                                            
                                        </div>
                                         <div class="tab-pane  p-20" id="counter" role="tabpanel">
                                            
                                        </div>
                                        <div class="tab-pane  p-20" id="course" role="tabpanel">
                                             
                                        </div>
                                        <div class="tab-pane  p-20" id="gallery" role="tabpanel">
                                            
                                        </div>
                                         <div class="tab-pane  p-20" id="teacher" role="tabpanel">
                                            
                                        </div>
                   <div class="tab-pane  p-20" id="about" role="tabpanel">
                    

                   </div>
                    <div class="tab-pane  p-20" id="future" role="tabpanel">
                      
                          </div>
                     <div class="tab-pane p-20" id="testimonial" role="tabpanel">
                                       
                                    </div>
                                    <div class="tab-pane p-20" id="header" role="tabpanel">
                                       
                                    </div>
                                  
                                    <div class="tab-pane p-20" id="footer" role="tabpanel">
                                       
                                    </div>
                                        <div class="tab-pane p-20" id="setting" role="tabpanel">
                                          
                                        </div>
                                    </div>
                                </div>
                                    <!-- Tab panes -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">{{\App\Provider::first()->name}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
          <div class="col-md-12">
          <form action="{{url('')}}/create/gallery/image" method="post" enctype="multipart/form-data" class="">
             {{ csrf_field() }}
              <div class="form-group">
                              <label>@lang('admin.slide') @lang('admin.title')</label>
                      <input type="text" placeholder="" class="form-control" name="title">
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.slide') @lang('admin.describe')</label>
                     <textarea class="form-control" name="description"></textarea>
                          </div>
                            <div class="form-group">
                              <label>@lang('admin.status')</label>
                   <select class="form-control" name="status">
                    <option value="1">@lang('admin.publish')</option> 
                    <option value="0">@lang('admin.pending')</option>
                   </select>
                          </div>
             <div class="form-group">
               <label>@lang('admin.slide') @lang('admin.image') (W1920 * H600)</label>
               <input type="file" id="input-file-now-custom-1" class="dropify" name="file" data-default-file="" />
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
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">@lang('admin.close')</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <div class="modal fade bs-example-modal-ab" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">{{\App\Provider::first()->name}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
          <div class="col-md-12">
          <form action="{{url('')}}/add/about/feature" method="post" enctype="multipart/form-data" class="">
             {{ csrf_field() }}
              <div class="form-group">
                              <label>@lang('admin.about') @lang('admin.feature') @lang('admin.title')</label>
                      <input type="text" placeholder="" class="form-control" name="title">
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.about') @lang('admin.feature') @lang('admin.describe')</label>
                     <textarea class="form-control" name="description"></textarea>
                          </div>
                            <div class="form-group">
                              <label>@lang('admin.about') @lang('admin.feature') @lang('admin.type')</label>
                   <select class="form-control" name="status">
                    <option value="Point">@lang('admin.point')</option> 
                    <option value="Bullet">@lang('admin.bullet')</option>
                   </select>
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
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <div class="modal fade bs-example-modal-ft" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">{{\App\Provider::first()->name}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
          <div class="col-md-12">
          <form action="{{url('')}}/create/feature/image" method="post" enctype="multipart/form-data" class="">
             {{ csrf_field() }}
              <div class="form-group">
                              <label>@lang('admin.feature') @lang('admin.title')</label>
                      <input type="text" placeholder="" class="form-control" name="title">
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.feature') @lang('admin.describe')</label>
                     <textarea class="form-control" name="description"></textarea>
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.status')</label>
                   <select class="form-control" name="status">
                    <option value="1">@lang('admin.publish')</option> 
                    <option value="0">Pending</option>
                   </select>
                          </div>
             <div class="form-group">
               <label>@lang('admin.feature') @lang('admin.image') (W242 * H268)</label>
               <input type="file" id="input-file-now-custom-1" class="dropify" name="file" data-default-file="" />
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
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">@lang('admin.close')</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <div class="modal fade bs-example-modal-tm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">{{\App\Provider::first()->name}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
          <div class="col-md-12">
          <form action="{{url('')}}/create/testimony/request" method="post" enctype="multipart/form-data" class="">
             {{ csrf_field() }}
             
                          <div class="row">
                            <div class="col-md-6">
                          <div class="form-group">
                              <label>@lang('admin.name')</label>
                      <input type="text" placeholder="" class="form-control" name="name">
                          </div>
                        </div>
                           <div class="col-md-6">
                          <div class="form-group">
                          <label>@lang('admin.test_year_grad')</label>
                      <input type="number" placeholder="" class="form-control" name="grad">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                            <div class="col-md-6">
                          <div class="form-group">
                          <label>@lang('admin.test_cu_job')</label>
                      <input type="text" placeholder="" class="form-control" name="job">
                          </div>
                           </div>
                           <div class="col-md-6">
                             <div class="form-group">
                              <label>@lang('admin.status')</label>
                   <select class="form-control" name="status">
                    <option value="1">@lang('admin.publish')</option> 
                    <option value="0">@lang('admin.pending')</option>
                   </select>
                          </div>
                           </div>
                         </div>
                           <div class="form-group">
                              <label>Testifier Description</label>
                     <textarea class="form-control" name="description"></textarea>
                          </div>
                           
             <div class="form-group">
               <label>@lang('admin.testifier') @lang('admin.image') (W242 * H268)</label>
               <input type="file" id="input-file-now-custom-1" class="dropify" name="file" data-default-file="" />
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
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">@lang('admin.close')</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg" style="max-width: 1200px;margin: 30px auto;">
            <div  class="come modal-content" style="height:auto; overflow:auto;">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">{{\App\Provider::first()->name}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
        <form action="{{url('')}}/create/about/page" method="post" >
           {{ csrf_field() }}
                                            <div class="row">
  <div class="col-md-3">
<input type="text" required placeholder="Menu Title" class="form-control" name="title">
</div>
<div class="col-md-2">
<select required class="form-control" name="category">
  <option value="">Choose Category</option>
  <option>{{\App\Frontcategory::first()->dom2}}</option>
  <option>{{\App\Frontcategory::first()->dom3}}</option>
  <option>{{\App\Frontcategory::first()->dom4}}</option>
  <option>{{\App\Frontcategory::first()->dom5}}</option>
  <option>{{\App\Frontcategory::first()->dom6}}</option>
  <option>{{\App\Frontcategory::first()->dom7}}</option>
</select>
</div>
<div class="col-md-2">
<select required class="form-control" name="status">
  <option value="">Choose Status</option>
  <option value="1">Publish</option>
  <option value="0">Pending</option>
</select>
</div>
 <input style="display: none;" type="text" id="showtwxtn" required name="content">
 <div class="col-md-2">
 <div class="btn-group">
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fa fa-plus"></i> Add Items
          </button>
          <div class="dropdown-menu" style="overflow-y: auto;max-height:300px;">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item">Full Layouts</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" onclick="loadfile('{{url('')}}/run/about?cid=1')" href="javascript:void(0)">About</a>
            <a class="dropdown-item" onclick="loadfile('{{url('')}}/run/about?cid=2')" href="javascript:void(0)">Course List</a>
             <a class="dropdown-item" onclick="loadfile('{{url('')}}/run/about?cid=3')" href="javascript:void(0)">Teacher List</a>
            <a class="dropdown-item" onclick="loadfile('{{url('')}}/run/about?cid=4')" href="javascript:void(0)">Events List</a>
            <a class="dropdown-item" onclick="loadfile('{{url('')}}/run/about?cid=6')" href="javascript:void(0)">NoticeBoard</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" >Sub Layouts</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Image Slider</a>
            <a class="dropdown-item" href="#">Introduction Card</a>
             <a class="dropdown-item" href="#">Count Analysis</a>
            <a class="dropdown-item" href="#">Highlight Tab</a>
            <a class="dropdown-item" href="#">Feature Card (Image)</a>
            <a class="dropdown-item" href="#">Feature Card (Text only)</a>
            <a class="dropdown-item" href="#">Action Card</a>
            <a class="dropdown-item" href="#">Image-Text Card</a>
            <a class="dropdown-item" href="#">Text-Image Card</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item">Featured Layouts</a>
            <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="#">Feature Courses</a>
            <a class="dropdown-item" href="#">Testimonial</a>
            <a class="dropdown-item" href="#">Event/Notification Tab</a>
            <a class="dropdown-item" href="#">Feature Teachers</a>
            <a class="dropdown-item" href="#">School Features</a>
          </div>
        </div>
</div>

 <div class="col-md-3">
  <div class="button-group">
<a onclick="savechanges()" class="btn btn-outline-primary btn-sm"><i class="fa fa-save"></i> Save Changes</a>
<button type="submit" class="btn btn-sm btn-info"><i class="fa fa-save"></i>Submit Changes</button>
</div>
</div>
</div>
</form>
                                   <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#hom2" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">HTML Editor</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profi2" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Preview</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profi3" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Choose Image</span></a> </li>
                            </ul>
  <div class="tab-content">
                                <div class="tab-pane active" id="hom2" role="tabpanel">
                                    <div class="p-20">
                              <div class="row">
       <textarea id="code" name="code" rows="10">
       </textarea>
     </div>
   </div>
 </div>
  <div class="tab-pane  p-20" id="profi2" role="tabpanel">
        <iframe id="preview" src="{{url('')}}/show/demo/design"></iframe>
                              </div>
                               <div class="tab-pane  p-20" id="profi3" role="tabpanel">
       <div class="row el-element-overlay">
                    <div class="col-md-12">
        <div class="row">
                @foreach(\App\Frontgallery::all() as $galleryn)
                      <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="{{url('')}}/uploads/frontend/{{$galleryn->image}}" alt="user" />
                                    <div class="el-overlay">
                                        <ul class="el-info">
                                            <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{url('')}}/uploads/frontend/{{$galleryn->image}}"><i class="icon-magnifier"></i></a></li>
                                            <li><a class="btn default btn-outline" onclick="deletegallery('{{$galleryn->id}}')" href="javascript:void(0);"><i class="fa fa-trash"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                           <div class="el-card-content">

                                    <h6 class="box-title">Area: <small>{{$galleryn->area}}px</small></h6>
                                    <h6 class="box-title">Size: <small>{{$galleryn->size/100}}Kb</small></h6> 
                                    <br/> 
                                    <a class="btn btn-primary btn-outline" onclick="copytextn('{{$galleryn->id}}')" href="javascript:void(0);"><i class="icon-link"></i><input type="text" value="{{url('')}}/uploads/frontend/{{$galleryn->image}}" id="imgurln{{$galleryn->id}}"></a>
                                  </div>
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
                  </div>
                                        </div>
                              </div>
                            </div>
                              <form  method="post" enctype="multipart/form-data" class="format">
     {{ csrf_field() }}
          
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
               function deletegallery(id)
              {
                if(confirm('Press Ok to confirm delete!!!')){ 
                $.get('{{url('')}}/delete/slide/'+id,function(data)
                {
                if(data==0){
                  swal('Image has been deleted Successfully', "clicked the button to continue!", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=59');
                }
            else{
                     swal("Error in deleting Image, It can not be deleted!", "clicked the button to continue!", "error");
                    }    
                });
            }
              }
              function deletefeature(id)
              {
                if(confirm('Press Ok to confirm delete!!!')){ 
                $.get('{{url('')}}/delete/feature/'+id,function(data)
                {
                if(data==0){
                  swal('Home Feature has been deleted Successfully', "clicked the button to continue!", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=59');
                }
            else{
                     swal("Error in deleting Home Feature, It can not be deleted!", "clicked the button to continue!", "error");
                    }    
                });
            }
              }
              function deletetestimony(id)
              {
                if(confirm('Press Ok to confirm delete!!!')){ 
                $.get('{{url('')}}/delete/testimony/'+id,function(data)
                {
                if(data==0){
                  swal('Testimony has been deleted Successfully', "clicked the button to continue!", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=59');
                }
            else{
                     swal("Error in deleting Testimony, It can not be deleted!", "clicked the button to continue!", "error");
                    }    
                });
            }
              }
function deleteabtfeat(id)
              {
                if(confirm('Press Ok to confirm delete!!!')){ 
                $.get('{{url('')}}/delete/aboutn/feature/'+id,function(data)
                {
                if(data==0){
                  swal('About Feature has been deleted Successfully', "clicked the button to continue!", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=59');
                }
            else{
                     swal("Error in deleting About Feature, It can not be deleted!", "clicked the button to continue!", "error");
                    }    
                });
            }
              }
          </script>
          <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
           <script type="text/javascript">
    var medicine_count      = {{count(\App\Frontlist::all())}};
    var total_amount        = 0;
    var deleted_medicines   = [];
    $('#medicine_input').hide();
    // CREATING BLANK medicine INPUT
    var blank_medicine = '';
    $(document).ready(function () {
        blank_medicine = $('#medicine_input').html();
    });
    function add_medicine()
    {
        medicine_count++;
        $("#medicine").append(blank_medicine);

        $('#medicine_id').attr('id', 'medicine_id_' + medicine_count);
        $('#medicine_delete').attr('id', 'medicine_delete_' + medicine_count);
        $('#medicine_delete_' + medicine_count).attr('onclick', 'deletemedicineParentElement(this, ' + medicine_count + ')');
    }

    // REMOVING medicine INPUT
    function deletemedicineParentElement(n, medicine_count) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
        deleted_medicines.push(medicine_count);
    }
</script>
<script>
    $(document).ready(function() {

        if ($(".mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

            });
        }
    });
    </script>
<script type="text/javascript">
  function geturl(href,content){
   jQuery('#'+content).html('<div class="row"><div class="col-md-12"><div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:70px;" /></div></div></div>');
       $.get('{{url('')}}/tab/page.fmp?page='+href, function(data, status){
        if(status == "success")
        {
          $('#'+content).html(data)
        }
      if(status == "error")
          {
$('#'+content).html('<div style="text-align:center;margin-top:200px;">Error in Loading Page Information</div>');
          }
    });
    }
</script>

                @endsection
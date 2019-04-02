@extends('layouts.student')
@section('content')
  <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.event_gallery')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.event_gallery')</li>
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
<div class="row el-element-overlay">
                    <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label>@lang('admin.filter_session_cat')</label>
                    <div class="input-group">
                      <span class="input-group-btn">
                <input style="width: 100%;" type="text" value="{{\Carbon\Carbon::today()->subYear(0)->format('Y')}}" id="first_session" class="form-control smdate" name="">
                <span class="input-group-addon bootstrap-touchspin-prefix">/</span>
                 <input style="width: 100%;" value="{{\Carbon\Carbon::today()->subYear(-1)->format('Y')}}" type="text" id="last_session" class="form-control emdate" name="">
                    <select style="width: 100%;" id="category" class="form-control">
                      <option value="all">@lang('admin.all_category')</option>
                      @foreach(\App\Gcategory::all() as $cat)
                      <option>{{$cat->title}}</option>
                      @endforeach
                    </select>
                   <button style="width: 100%;" onclick="geturl()" class="input-group-addon bootstrap-touchspin-prefix">@lang('admin.search')</button>
                     </span>
                  </div>
                        </div>
                      </div>
                    </div>
                        <h4 class="card-title"></h4>
                       @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div id="showgallery">
                        <div class="row">
    @forelse($gallerys as $gallery)     
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="{{url('')}}/uploads/gallery/{{$gallery->image}}" alt="user" />
                                    <div class="el-overlay">
                                      <h3 class="box-title"></h3><small>{{$gallery->caption}}</small>
                                        <ul class="el-info">
                                            <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{url('')}}/uploads/gallery/{{$gallery->image}}"><i class="icon-magnifier"></i></a></li>
                                            <li></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h3 class="box-title"></h3><small>{{$gallery->caption}}</small>
                                    <br/> </div>
                            </div>
                        </div>
                    </div>
                   @empty
                    <h3 class="text-themecolor">@lang('admin.no_image') {{$id.'/'.$idd}} @lang('admin.session')</h3>
                   @endforelse
                </div>
           @if(count($gallerys)>0)
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
   <div class="col-lg-4 m-b-30" id="pagination">
                                      <nav aria-label="Page navigation example">
                                            <ul class="pagination">
                                                <li class="page-item">
                                                    <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>
 @for($i=0;$i<=count(\App\Gallery::where('session',$id.'/'.$idd)->get())/16;$i++)
                                        
                                           <li class="page-item"><a class="page-link" href="{{$gallerys->url($i+1)}}">{{$i+1}}</a></li>
                                      
                                          @endfor
                                                <li class="page-item">
                                                    <a class="page-link" href="javascript:void(0)" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>  
                                    </div>
</div>
@endif
                        </div>       
            </div>
        </div>

<script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>         
<script type="text/javascript">
   
function geturl(){
   jQuery("#showgallery").html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:70px;" /></div>');
var first_session=$('#first_session').val();
var last_session=$('#last_session').val();
var category=$('#category').val();
       $.get('{{url('')}}/ssort/gallery/'+first_session+'/'+last_session+'/'+category, function(data, status){
        if(status == "success")
        {
            $('#showgallery').html(data)
        }
      if(status == "error")
          {

          }
    });
    }
  
  $(document).ready(function() {
   geturl();
        $('.smdate').bootstrapMaterialDatePicker({ weekStart : 0,time:false,format:'Y' }).on('change', function(e, date)
        {
            $('.emdate').bootstrapMaterialDatePicker('setMinDate', date);
            $('.emdate').bootstrapMaterialDatePicker('setMaxDate',moment(date).add(1, 'year').format('Y'));
            $('.emdate').val(moment(date).add(1, 'year').format('Y'));
           
     });
         $('.emdate').bootstrapMaterialDatePicker({ weekStart : 0,time:false,format:'Y' }).on('change', function(e, daten)
        {
            $('.smdate').bootstrapMaterialDatePicker('setMaxDate', daten);
            $('.smdate').bootstrapMaterialDatePicker('setMinDate',moment(daten).add(-1, 'year').format('Y'));
            $('.smdate').val(moment(daten).add(-1, 'year').format('Y'));
           
     });
 
});
</script>
@endsection
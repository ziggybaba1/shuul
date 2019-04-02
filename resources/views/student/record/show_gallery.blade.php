 <!-- Popup CSS -->
    <link href="{{url('')}}/assets/plugins/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
 <div class="row" id="">
    @forelse($gallerys as $gallery)     
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="{{url('')}}/uploads/gallery/{{$gallery->image}}" alt="user" />
                                    <div class="el-overlay">
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
    @if($cat==='all')
 @for($i=0;$i<=count(\App\Gallery::where('session',$id.'/'.$idd)->get())/16;$i++)
                                        
                                           <li class="page-item"><a id="first{{$i+1}}" class="page-link" href="{{$gallerys->url($i+1)}}">{{$i+1}}</a></li>
                                      
                                          @endfor
    @else
    @for($i=0;$i<=count(\App\Gallery::where('session',$id.'/'.$idd)->where('category',$cat)->get())/16;$i++)
                                        
                                           <li class="page-item"><a class="page-link" href="{{$gallerys->url($i+1)}}">{{$i+1}}</a></li>
                                      
                                          @endfor
    @endif
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
 <script src="{{url('')}}/assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="{{url('')}}/assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
    <script type="text/javascript">
         
    $('#pagination li a').on('click', function(e){
    e.preventDefault();
     $('.page-link').css("background-color","white");
    var url = $(this).attr('href');
    $.get(url, $('#search').serialize(), function(data){
        $('#showgallery').html(data);
         $(this).css("background-color","blue");
    });
});
     
    </script>